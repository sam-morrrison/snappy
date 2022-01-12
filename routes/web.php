<?php

use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/properties', [DashboardController::class, 'index']);
Route::get('/properties/{property}', [DashboardController::class, 'show']);

Route::get('/agent', [AdminAgentController::class, 'create']);
Route::post('/agent', [AdminAgentController::class, 'store']);
Route::post('/agent/link', [AdminAgentController::class, 'link']);

