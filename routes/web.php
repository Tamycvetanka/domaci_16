<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherApiController::class, 'form'])->name('weather.form');
Route::post('/weather', [WeatherApiController::class, 'search'])->name('weather.search');
