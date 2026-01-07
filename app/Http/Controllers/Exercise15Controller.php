<?php

namespace App\Http\Controllers;

use App\Models\Forecast;

class Exercise15Controller extends Controller
{
    public function index()
    {
        $forecasts = Forecast::with('city')
            ->orderBy('city_id')
            ->orderBy('date')
            ->get();

        return view('exercise15.index', compact('forecasts'));
    }
}
