<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\CRUDcontroller;

Route::get('/',[registerController::class, 'index']);
Route::get('/',[dashboardController::class, 'index']);
Route::get('/sales/view/{tab}', [dashboardController::class, 'sales_view']);
Route::get('/delivery/view/{tab}', [dashboardController::class, 'delivery_view']);

Route::get('/customers/{tab}', [CRUDcontroller::class, 'cus_index'])->name('cus');
Route::post('/customers/{tab}', [CRUDcontroller::class, 'cus_store']);
Route::post('/customers/edit/{id}', [CRUDcontroller::class, 'cus_update'])->name('cus.update');
Route::get('/customers/form/delete/{id}', [CRUDcontroller::class, 'cus_delete'])->name('cus.delete');

Route::get('/suppliers/{tab}', [CRUDcontroller::class, 'supp_index'])->name('supp');
Route::post('/suppliers/{tab}', [CRUDcontroller::class, 'supp_store']);
Route::post('/suppliers/edit/{id}', [CRUDcontroller::class, 'supp_update'])->name('supp.update');
Route::get('/suppliers/form/delete/{id}', [CRUDcontroller::class, 'supp_delete'])->name('supp.delete');

Route::get('/inventory', [CRUDcontroller::class, 'inv_index'])->name('inv');
Route::post('/inventory', [CRUDcontroller::class, 'inv_store']);
Route::post('/inventory/edit/{id}', [CRUDcontroller::class, 'inv_update'])->name('inv.update');
Route::get('/inventory/delete/{id}', [CRUDcontroller::class, 'inv_delete'])->name('inv.delete');

Route::get('/transactions', [transactionController::class, 'index'])->name('tran');
Route::get('/transactions/delivery/{id}', [transactionController::class, 'Delivery']);
Route::get('/transactions/sales/{id}', [transactionController::class, 'Sales']);
Route::post('/transactions/checkout', [transactionController::class, 'checkout']);