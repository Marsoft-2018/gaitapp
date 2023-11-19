<?php

use App\Http\Controllers\Admin\EgresoController;
use App\Http\Controllers\Admin\PucController;
use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\ParticipanteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('participantes',ParticipanteController::class)->names('admin.participantes')->middleware('auth');
Route::resource('conceptos',ConceptoController::class)->names('admin.conceptos')->middleware('auth');
Route::resource('pucs',PucController::class)->names('admin.pucs')->middleware('auth');//ruta para el controlador del plan unico de cuentas puc

Route::resource('egresos',EgresoController::class)->names('admin.egresos')->middleware('auth');