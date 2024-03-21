<?php

namespace App\Http\Controllers;

use App\Services\CountryServiceProvider;

class CountriesController extends Controller
{
    protected $countryService;

    public function __construct(CountryServiceProvider $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        try {
            $countries = $this->countryService->getRandomCountries(5);

            if ($countries) {
                return view('countries.index', ['countries' => $countries]);
            } else {
                return view('countries.index')->with('message', 'Failed to fetch data from the API. Please try again later.');
            }
        } catch (\Exception $e) {
            \Log::error('API request failed: ' . $e->getMessage());
            return view('countries.index')->with('message', 'Failed to fetch data from the API. Please try again later.');
        }
    }
}
