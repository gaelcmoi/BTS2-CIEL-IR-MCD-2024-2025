<?php

use App\Http\Controllers\ChampionController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

// Custom routes
Route::get('champions/classic', [ChampionController::class, 'classic'])->name('champions.classic');
// Resource routes
Route::resource('champions', ChampionController::class);
Route::resource('regions', RegionController::class);
Route::resource('resources', ResourceController::class);
Route::resource('genders', GenderController::class);

Route::get('/', function () {
    return view('welcome');
});
