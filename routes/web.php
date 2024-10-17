<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


require __DIR__ . '/admin.php';
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(UserMiddleware::class);
Route::get('/', [FrontendController:: class, 'index'])->name('index');
Route::get('/teams', [FrontendController:: class, 'team'])->name('teams');
Route::get('/services', [FrontendController:: class, 'service'])->name('services');
Route::get('/skills', [FrontendController:: class, 'skillPrefer'])->name('skills');
Route::get('/contacts', [FrontendController:: class, 'communicate'])->name('communicates');
