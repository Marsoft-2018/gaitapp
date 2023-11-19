<?php

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

Route::get('/admin/cuentas', function() {
    return view('admin/cuentas');
})->name('cuentas')->middleware('auth');


Route::resource('participantes',ParticipanteController::class,)->names('admin.participantes');
// Route::get('/admin/participantes',[ParticipanteController::class,'index'], function() {
//     return view('admin/participantes/index');
// })->name('participantes')->middleware('auth');

// Route::get('/admin/participantes/create', function() {
//     return view('admin/participantes/create');
// })->name('participantes')->middleware('auth');

// Route::post('/admin/participantes/create',[ParticipanteController::class,'store'], function() {
//     return view('admin/participantes/create');
// })->name('participantes')->middleware('auth');