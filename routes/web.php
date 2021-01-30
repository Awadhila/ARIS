<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;


Route::get('/',[registerController::class, 'index']);
Route::get('/home',[loginController::class, 'index'])->middleware('auth');
