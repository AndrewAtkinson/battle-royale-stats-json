<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use ApexLegends\Client;


class ApexController extends BaseController
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->login(env('APEX_API_LOGIN'), env('APEX_API_PASSWORD'));
    }


    public function getStatsPlatform($username, $platform)
    {
        switch (strtolower($platform)) {
            case "xbox":

                break;
            case "ps4":

                break;
            case "pc":
            default:

                dd($this->client->users($username));
                $user = $this->client->users($username)[0];
                $stats = $user->stats('PC');
                break;
        }

        return response()->json($stats);

    }

}
