<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\languageController;
use App\Http\Controllers\Admin\MainCategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

define('PAGINATION', 8);
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    ######## Languages Routes #########
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', [languageController::class, 'all'])->name('admin.langs');
        Route::get('/create', [languageController::class, 'create'])->name('admin.lang.create');
        Route::post('/store', [languageController::class, 'store'])->name('admin.lang.store');
        Route::get('/edit/{id}', [languageController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [languageController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [languageController::class, 'destroy'])->name('admin.delete');
    });
    ######## Languages Routes #########

    ######## Main Categories Routes #########
    Route::group(['prefix' => 'mainCategories'], function () {
        Route::get('/', [MainCategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/create', [MainCategoriesController::class, 'create'])->name('admin.cat.create');
        Route::post('/store', [MainCategoriesController::class, 'store'])->name('admin.cat.store');
        Route::get('/edit/{id}', [MainCategoriesController::class, 'edit'])->name('admin.cat.edit');
        Route::post('/update/{id}', [MainCategoriesController::class, 'update'])->name('admin.cat.update');
        Route::get('/delete/{id}', [MainCategoriesController::class, 'destroy'])->name('admin.cat.delete');
    });
    ######## Main Categories Routes #########
});
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [LoginController::class, 'getLoginPage'])->name('get.admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});
