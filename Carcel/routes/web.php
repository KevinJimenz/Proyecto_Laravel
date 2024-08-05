<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrisioneroController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HistorialController;

Route::get('/', function () {
return view('auth.login');
})->name('root');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/prisioneros', PrisioneroController::class)->middleware('auth');
Route::resource('/visitas', VisitaController::class)->middleware('auth');
Route::resource('/visitantes', VisitanteController::class)->middleware('auth');
// Ruta para mostrar el formulario de reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index')->middleware('auth');

// Ruta para procesar el formulario de reportes
Route::post('/reportes', [ReporteController::class, 'generar'])->name('reportes.generar')->middleware('auth');
