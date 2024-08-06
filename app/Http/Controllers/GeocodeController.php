<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    public function geocode($address)
    {

        $response = Http::get('http://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $address,
            'sensor' => 'false',
        ]);

        return $response->json();
    }
}
