<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Fortnite\Auth;
use Fortnite\Account;
use Fortnite\Mode;
use Fortnite\Language;
use Fortnite\Platform;
use Fortnite\Stats;
use Fortnite\News;

class ForniteController extends BaseController
{

    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::login(env('FORNITE_API_LOGIN'), env('FORNITE_API_PASSWORD'));
    }

    public function index()
    {
        return response()->json($this->auth->news->get(News::BATTLEROYALE, Language::ENGLISH));
    }

    public function getStats($username)
    {
        // Authenticate
        return response()->json($this->auth->profile->stats->lookup($username));
    }

    public function getStatsPlatform($username, $platform, $type = null)
    {

        switch (strtolower($platform)) {
            case "xbox":
                $platform = Platform::XBOX1;
                break;
            case "ps4":
                $platform = Platform::PS4;
                break;
            case "pc":
            default:
                $platform = Platform::PC;
                break;
        }

        $response = $this->auth->profile->stats->lookup($username)->$platform;

        if (!empty($type)) {
            switch (strtolower($type)) {
                case "squads":
                case "squad":
                    $type = 'squad';
                    break;
                case "duo":
                    $type = 'duo';
                    break;
                case "solo":
                default:
                    $type = 'solo';
                    break;
            }
            $response = $response->$type;
        }
        // Authenticate
        return response()->json($response);
    }
}
