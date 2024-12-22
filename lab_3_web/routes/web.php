<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/', [CityController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/cities/trashed', [CityController::class, 'trashed'])->name('cities.trashed');
    Route::patch('/cities/{id}/restore', [CityController::class, 'restore'])->name('cities.restore');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('users/{user}/cities', [CityController::class, 'indexForUser'])->name('users.cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create'); // Форма создания
    Route::post('/cities', [CityController::class, 'store'])->name('cities.store');        // Сохранение нового объекта
    Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');    // Показ конкретного объекта
    Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit'); // Форма редактирования
    Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update'); // Обновление объекта
    Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy'); // Удаление объекта
});

require __DIR__.'/auth.php';
