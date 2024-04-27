<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', [EventoController::class, 'calendario'])->middleware(['auth'])->name('dashboard');
Route::get('/obtener-eventos', [EventoController::class, 'obtener_eventos'])->middleware(['auth'])->name('dashboard');
Route::post('/guardar-evento', [EventoController::class, 'guardar_evento'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
