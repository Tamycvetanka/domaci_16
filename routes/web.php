<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherApiController;
use App\Http\Controllers\UserWeatherController;
use App\Http\Controllers\Exercise12Controller;
use App\Http\Controllers\Exercise13Controller;
use App\Http\Controllers\Exercise14Controller;
use App\Http\Controllers\Exercise15Controller;
use App\Models\City;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherApiController::class, 'form'])->name('weather.form');
Route::post('/weather', [WeatherApiController::class, 'search'])->name('weather.search');

Route::get('/user-weathers', [UserWeatherController::class, 'index'])->name('user.weathers');

Route::get('/exercise-12', function () {
    return City::with('forecasts', 'weather')->take(3)->get();
});

Route::get('/exercise-12-view', [Exercise12Controller::class, 'index'])->name('exercise12.view');

Route::get('/exercise-13', [Exercise13Controller::class, 'index'])->name('exercise13.index');

Route::get('/exercise-14', [Exercise14Controller::class, 'index'])->name('exercise14.index');
Route::post('/exercise-14', [Exercise14Controller::class, 'store'])->name('exercise14.store');

/* ===== EXERCISE 15 ===== */
Route::get('/exercise-15', [Exercise15Controller::class, 'index'])
    ->name('exercise15.index');
