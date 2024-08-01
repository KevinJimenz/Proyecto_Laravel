<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrisioneroController;

Route::get('/', function () {
return view('auth.login');
})->name('login');

// ruta para redireccionar del login al dashboard
Route::post('/', function () {
    return view('layouts.app');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/prisioneros', PrisioneroController::class)->middleware('auth');