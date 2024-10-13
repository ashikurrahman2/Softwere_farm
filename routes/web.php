<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


require __DIR__ . '/admin.php';
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(UserMiddleware::class);
// Route::get('/', [FrontendController:: class, 'index'])->name('index');
// Route::get('/epapers', [FrontendController:: class, 'epaper'])->name('epapers');
// Route::get('/epapers/{slug}', [FrontendController::class, 'epaperdetails'])->name('epapers.epaperdetails');
