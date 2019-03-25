<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['uses' => 'Controller@index']);
//Fornite
$router->get('/fornite', ['uses' => 'ForniteController@index']);
$router->get('/fornite/{username}', ['uses' => 'ForniteController@getStats']);
$router->get('/fornite/{username}/{platform}', ['uses' => 'ForniteController@getStatsPlatform']);
$router->get('/fornite/{username}/{platform}/{type}', ['uses' => 'ForniteController@getStatsPlatform']);
//Apex
$router->get('/apex/{username}/{platform}', ['uses' => 'ApexController@getStatsPlatform']);