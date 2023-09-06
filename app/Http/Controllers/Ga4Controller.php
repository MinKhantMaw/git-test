<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google\Service\AnalyticsData;

class Ga4Controller extends Controller
{
    public function getData()
    {
        $client = new Google_Client();
        $client->setAuthConfig(config('ga4.credentials_json'));
        $client->setScopes([AnalyticsData::ANALYTICS_READONLY]);
        $client->fetchAccessTokenWithAssertion();

        $analyticsData = new AnalyticsData($client);

        // Your GA4 API request code goes here

        return response()->json($analyticsData);
    }
}
