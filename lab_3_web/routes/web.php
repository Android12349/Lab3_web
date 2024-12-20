<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cities/trashed', [CityController::class, 'trashed'])->name('cities.trashed');
Route::patch('cities/{id}/restore', [CityController::class, 'restore'])->name('cities.restore');
Route::resource('cities', CityController::class);
