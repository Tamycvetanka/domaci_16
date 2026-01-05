<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherApiController extends Controller
{
    public function form()
    {
        return view('weather.current');
    }

    public function current()
    {
        return view('weather.current');
    }

    public function search(Request $request)
    {
        $request->validate([
            'city' => ['required', 'string', 'min:2'],
        ]);

        $key  = config('services.weatherapi.key');
        $base = config('services.weatherapi.base');

        if (!$key) {
            return back()
                ->withErrors(['city' => 'WEATHERAPI_KEY nije podešen u .env fajlu.'])
                ->withInput();
        }


        $response = Http::withoutVerifying()->get($base . '/current.json', [
            'key'  => $key,
            'q'    => $request->city,
            'lang' => 'sr',
        ]);

        if ($response->failed()) {
            return back()
                ->withErrors(['city' => 'Grad nije pronađen ili API ne radi.'])
                ->withInput();
        }

        $data = $response->json();

        return view('weather.current', [
            'city'        => $data['location']['name'] ?? $request->city,
            'temp'        => $data['current']['temp_c'] ?? null,
            'feels_like'  => $data['current']['feelslike_c'] ?? null,
            'humidity'    => $data['current']['humidity'] ?? null,
            'description' => $data['current']['condition']['text'] ?? null,
        ]);
    }
}
