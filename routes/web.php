<?php

use App\Http\Controllers\HumedadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HumedadController::class, 'actualizarHumedades'])->name('humedades.actualizar');
//Route::get('/historico', [HumedadController::class, 'historico'])->name('historico');
Route::get('/historico', [HumedadController::class, 'historico'])->name('humedades.historico');
Route::post('/humedades', [HumedadController::class, 'actualizarHumedades'])->name('humedades.actualizar');

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

/*Route::get('/', function () {
return view('welcome');
});

 */



