<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\Auth\registerController;


Route::get('/',[registerController::class, 'index']);
Route::get('/',[dashboardController::class, 'index']);
Route::get('/sales/view/{tab}', [dashboardController::class, 'sales_view']);
Route::get('/delivery/view/{tab}', [dashboardController::class, 'delivery_view']);

Route::get('/customers/{tab}', [clientsController::class, 'cus_index'])->name('cus');
Route::post('/customers/{tab}', [clientsController::class, 'cus_store']);
Route::post('/customers/edit/{id}', [clientsController::class, 'cus_update'])->name('cus.update');
Route::get('/customers/form/delete/{id}', [clientsController::class, 'cus_delete'])->name('cus.delete');

Route::get('/suppliers/{tab}', [clientsController::class, 'supp_index'])->name('supp');
Route::post('/suppliers/{tab}', [clientsController::class, 'supp_store']);
Route::post('/suppliers/edit/{id}', [clientsController::class, 'supp_update'])->name('supp.update');
Route::get('/suppliers/form/delete/{id}', [clientsController::class, 'supp_delete'])->name('supp.delete');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inv');
Route::post('/inventory', [InventoryController::class, 'store']);
Route::post('/inventory/edit/{id}', [InventoryController::class, 'update'])->name('inv.update');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inv.delete');

Route::get('/transactions', [transactionController::class, 'index'])->name('tran');


Route::get('/transactions/delivery/{id}', [transactionController::class, 'Delivery']);
Route::get('/transactions/sales/{id}', [transactionController::class, 'Sales']);
Route::post('/transactions/checkout', [transactionController::class, 'checkout']);