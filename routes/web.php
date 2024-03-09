<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\OAuthController;

Route::permanentRedirect('/', '/dashboard');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::middleware('auth')->group(function () {
    Route::post('/execute-job', [ProjectController::class, 'getRepositories'])->name('execute.job');
    Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{username}/edit/updated', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/auth/{github}/redirect', [OAuthController::class, 'redirect']);
Route::get('/auth/{github}/callback', [OAuthController::class, 'callback']);

Auth::routes();
