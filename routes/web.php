<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cusController;
use App\Http\Controllers\suppController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;


Route::get('/',[registerController::class, 'index']);
Route::get('/',[dashboardController::class, 'index']);

Route::get('/customers', [cusController::class, 'index'])->name('cus');
Route::get('/suppliers', [suppController::class, 'index'])->name('supp');