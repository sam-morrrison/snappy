<?php

use App\Http\Controllers\PropertyController;


Route::get('/property', [PropertyController::class, 'index']);
Route::post('/property', [PropertyController::class, 'store']);


