<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

Route::permanentRedirect('/', '/dashboard');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::middleware('auth')->group(function () {
    Route::post('/execute-job', [ProjectController::class, 'executeJob'])->name('execute.job');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Auth::routes();
