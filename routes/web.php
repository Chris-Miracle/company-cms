<?php

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

Auth::routes();
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create-employee', [App\Http\Controllers\HomeController::class, 'createEmployee'])->name('create-employee');
    Route::post('/store-employee', [App\Http\Controllers\HomeController::class, 'storeEmployee'])->name('store-employee-details');
    Route::get('/pay-employee', [App\Http\Controllers\HomeController::class, 'payEmployee'])->name('pay-employee');
    Route::post('/pay-bulk-employee', [App\Http\Controllers\HomeController::class, 'payEmployeeBulk'])->name('pay-bulk-employees-salary');
    Route::post('/pay-single-employee', [App\Http\Controllers\HomeController::class, 'payEmployeeSingle'])->name('pay-single-employees-salary');
});
