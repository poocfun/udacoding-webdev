<?php

use App\Http\Controllers\KuotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanController;

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



Route::controller(SatuanController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('satuan', 'store');
    Route::put('onoffsatuan/{id}', 'update_status');
    Route::post('update-satuan/{id}', 'update');
});


Route::controller(KuotaController::class)->group(function () {
    Route::get('kuota', 'index');
    Route::post('kuota', 'create');
    Route::put('onoffkuota/{id}', 'update_status');
    Route::post('update-kuota/{id}', 'update');
});
