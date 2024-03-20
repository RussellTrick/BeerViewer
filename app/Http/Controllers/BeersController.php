<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class BeersController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.punkapi.com/v2/beers/random');
        $beers = json_decode($response->getBody(), true);

        Log::info('API Response:', ['response' => $beers]);

        if ($beers) {
            return view('beers', ['beers' => $beers]);
        } else {
            return view('error', ['message' => 'API is not responding']);
        }
    }
}
