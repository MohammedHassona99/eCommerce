<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\languageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

define('PAGINATION', 8);
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', [languageController::class, 'all'])->name('admin.langs');
        Route::get('/create', [languageController::class, 'create'])->name('admin.lang.create');
        Route::post('/store', [languageController::class, 'store'])->name('admin.lang.store');
        // Route::get('/edit{id}', [languageController::class, 'all'])->name('admin.edit');
    });
});
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [LoginController::class, 'getLoginPage'])->name('get.admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});
