<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SmtpController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/***  Login and change password route   ***/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'adminLogin'])->name('login');
    Route::middleware(['auth', IsAdmin::class])->group(function(){
        Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
        Route::get('/logout', [AdminHomeController::class, 'logout'])->name('logout');
        Route::get('/password/change', [AdminHomeController::class, 'passwordChange'])->name('password.change');
        Route::post('/password/update', [AdminHomeController::class, 'passwordUpdate'])->name('password.update');
    });
});

/*** Website page route ***/
Route::middleware(['auth', IsAdmin::class])->group(function() {
    Route::resource('abouts', AboutController::class)->except(['show', 'create']);
    Route::resource('team', TeamController::class);
    Route::resource('service', ServiceController::class);
    
   
    /*** Setting Route ***/
    Route::prefix('setting')->group(function () {
        Route::resource('seo', SeoController::class)->only(['index', 'update']);
        Route::resource('smtp', SmtpController::class)->only(['index', 'update']);
        Route::resource('website', SettingController::class)->only(['index', 'update']);  
        Route::resource('page', PageController::class);  
    });

    
});
