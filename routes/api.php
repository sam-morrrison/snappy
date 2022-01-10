<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\PropertyController;


Route::get('/property', [PropertyController::class, 'index']);
Route::post('/property', [PropertyController::class, 'store']);
Route::put('/property/{property}', [PropertyController::class, 'update']);
Route::delete('/property/{property}', [PropertyController::class, 'destroy']);

Route::get('agent/top', [AgentController::class, 'getTopAgents']);
