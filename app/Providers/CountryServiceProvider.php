<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CountryServiceProvider
{
    protected $baseUrl = 'https://restcountries.com/v3.1';

    /**
     * Get all countries from the API.
     */
    public function getAllCountries()
    {
        try {
            $response = Http::get("{$this->baseUrl}/all");

            if ($response->ok()) {
                return $response->json();
            } else {
                Log::error('Failed to fetch countries: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Exception when fetching countries: ' . $e->getMessage());
            return null;
        }

        return null;
    }

    /**
     * Get a country by its name from the API.
     */
    public function getCountryByName($name)
    {
        try {
            $response = Http::get("{$this->baseUrl}/name/{$name}");

            if ($response->ok()) {
                return $response->json();
            } else {
                Log::error('Failed to fetch country: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception when fetching country: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Get a random selection of countries.
     */
    public function getRandomCountries($count = 5)
    {
        $countries = $this->getAllCountries();

        if(!$countries){
            return;
        }

        if (count($countries) > $count) {
            shuffle($countries);
            $countries = array_slice($countries, 0, $count);
        }

        return $countries;
    }
}
