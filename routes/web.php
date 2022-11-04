<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listamarca', [App\Http\Controllers\PhoneBrandsController::class, 'listamarca'])->name('listamarca');
Route::get('/listamodelo', [App\Http\Controllers\PhoneModelsController::class, 'listamodelo'])->name('listamodelo');
Route::get('/creaMarca', [App\Http\Controllers\PhoneBrandsController::class, 'creaMarca'])->name('creaMarca');
Route::post('/saveMarca', [App\Http\Controllers\PhoneBrandsController::class, 'saveMarca'])->name('saveMarca');
Route::get('/editMarca/{id}', [App\Http\Controllers\PhoneBrandsController::class, 'editMarca'])->name('editMarca');
Route::post('/updateMarca', [App\Http\Controllers\PhoneBrandsController::class, 'updateMarca'])->name('updateMarca');
Route::get('/editModelo/{id}', [App\Http\Controllers\PhoneModelsController::class, 'editModelo'])->name('editModelo');
Route::post('/updateModelo', [App\Http\Controllers\PhoneModelsController::class, 'updateModelo'])->name('updateModelo');
Route::get('/creaModelo', [App\Http\Controllers\PhoneModelsController::class, 'creaModelo'])->name('creaModelo');
Route::get('/vermodelo/{id}', [App\Http\Controllers\PhoneModelsController::class, 'vermodelo'])->name('vermodelo');
Route::post('/saveModelo', [App\Http\Controllers\PhoneModelsController::class, 'saveModelo'])->name('saveModelo');

Route::get('/changeInventory/{id}/{action}', [App\Http\Controllers\PhoneModelsController::class, 'changeInventory'])->name('changeInventory');