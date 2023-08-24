<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [LoginController::class, 'getLoginPage'])->name('get.admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});
