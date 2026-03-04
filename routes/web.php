<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponsesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Blok 1
Route::get('/blok1', [ResponsesController::class, 'showBlok1'])->name('blok1');
Route::post('/blok1', [ResponsesController::class, 'submitBlok1'])->name('blok1.submit');

// // Blok 2
Route::get('/blok2', [ResponsesController::class, 'showBlok2'])->name('blok2');
Route::post('/blok2', [ResponsesController::class, 'submitBlok2'])->name('blok2.submit');

// // Blok 3
Route::get('/blok3', [ResponsesController::class, 'showBlok3'])->name('blok3');
Route::post('/blok3', [ResponsesController::class, 'submitBlok3'])->name('blok3.submit');

Route::get('/blok4', [ResponsesController::class, 'showBlok4'])->name('blok4');
Route::post('/blok4', [ResponsesController::class, 'submitBlok4'])->name('blok4.submit');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/export-excel', [DashboardController::class, 'exportExcel'])
    ->middleware('auth')
    ->name('export.excel');
