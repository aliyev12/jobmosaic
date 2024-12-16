<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    // @desc Make request to map service
    // @route GET /geocode
    public function geocode(Request $request): array
    {
        $address = $request->input('address');
        $accessToken = env('OPEN_CAGE_KEY');

        $response = Http::get("https://api.opencagedata.com/geocode/v1/json", [
            'q' => urlencode($address),
            'key' => $accessToken
        ]);

        return $response->json();
    }
}
