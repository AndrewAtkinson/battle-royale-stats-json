<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Foaas\Foaas;
use Faker;

class Controller extends BaseController
{
    public function index()
    {
        $params = [];
        $foaas = new Foaas();
        $faker = Faker\Factory::create();

        $operations = $foaas->operations();

        $operation = $operations[array_rand($operations)];

        $url = explode('/', ltrim($operation['url'], '/'));
        $method = array_shift($url);

        foreach ($url as $urlPart) {
            switch ($urlPart) {
                case ':company':
                    $params[] = $faker->company;
                    break;
                case ':name':
                case ':from':
                default:
                    $params[] = $faker->firstName();
                    break;
            }
        }

        return response()
            ->json(call_user_func_array(array($foaas, $method), $params));
    }
}
