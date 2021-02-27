<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cusController;
use App\Http\Controllers\suppController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\Auth\registerController;


Route::get('/',[registerController::class, 'index']);
Route::get('/',[dashboardController::class, 'index']);

Route::get('/customers', [cusController::class, 'index'])->name('cus');
Route::post('/customers', [cusController::class, 'store']);
Route::post('/customers/edit/{id}', [cusController::class, 'update'])->name('cus.update');
Route::get('/customers/delete/{id}', [cusController::class, 'delete'])->name('cus.delete');

Route::get('/suppliers', [suppController::class, 'index'])->name('supp');
Route::post('/suppliers', [suppController::class, 'store']);

Route::get('/inventory', [InventoryController::class, 'index'])->name('inv');
Route::post('/inventory', [InventoryController::class, 'store']);

Route::post('/inventory/edit/{id}', [InventoryController::class, 'update'])->name('inv.update');

Route::get('/transactions', [transactionController::class, 'index'])->name('tran');
Route::post('/transactions', [transactionController::class, 'store']);