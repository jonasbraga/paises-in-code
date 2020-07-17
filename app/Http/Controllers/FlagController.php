<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlagController extends Controller
{

    public function list($region = 'usan')
    {
        # code...
        $countries = Http::get("https://restcountries.eu/rest/v2/regionalbloc/$region")->json();

        return view("index", compact('countries'));
    }

    public function listCountry($countryName = null)
    {
        if (!$countryName) abort(400);
        # code...
        $country = Http::get("https://restcountries.eu/rest/v2/name/$countryName")->json()[0];

        $neighbors = $this->listNeighborCountries($countryName);

        return view("country", compact('country', 'neighbors'));
    }

    public function listNeighborCountries($mainCountry = null)
    {
        if (!$mainCountry) abort(400);
        # code...
        $country = Http::get("https://restcountries.eu/rest/v2/name/$mainCountry")->json()[0];

        $neighbors = [];
        foreach (array_slice($country['borders'], 0, 3) as $neighbor) {

            $neighborCountry = Http::get("https://restcountries.eu/rest/v2/name/$neighbor")->json();
            $neighborCountry = reset($neighborCountry);
            $neighbors[] = [
                'flag' => $neighborCountry['flag'],
                'name' => $neighborCountry['name']
            ];
        }

        return $neighbors;
    }
}
