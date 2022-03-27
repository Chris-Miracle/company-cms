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
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('welcome');
Route::get('/account-settings', [App\Http\Controllers\DashboardController::class, 'accountSetting'])->middleware('auth')->name('account-settings');
Route::post('/personal-account-settings', [App\Http\Controllers\DashboardController::class, 'personalSetting'])->middleware('auth')->name('personal-account-setting');
Route::post('/wallet-account-settings', [App\Http\Controllers\DashboardController::class, 'walletSetting'])->middleware('auth')->name('wallet-account-setting');
Route::post('/security-account-settings', [App\Http\Controllers\DashboardController::class, 'securitySetting'])->middleware('auth')->name('security-account-setting');

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create-employee', [App\Http\Controllers\HomeController::class, 'createEmployee'])->name('create-employee');
    Route::post('/store-employee', [App\Http\Controllers\HomeController::class, 'storeEmployee'])->name('store-employee-details');
    Route::get('/pay-employee', [App\Http\Controllers\HomeController::class, 'payEmployee'])->name('pay-employee');
    Route::post('/pay-bulk-employee', [App\Http\Controllers\HomeController::class, 'payEmployeeBulk'])->name('pay-bulk-employees-salary');
    Route::post('/pay-single-employee', [App\Http\Controllers\HomeController::class, 'payEmployeeSingle'])->name('pay-single-employees-salary');
});
