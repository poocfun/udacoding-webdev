<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('leaderboard', [DashboardController::class, 'leaderboard']);
Route::post('leaderboard', [DashboardController::class, 'store']);
Route::get('delete-leaderboard/{id}', [DashboardController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});

