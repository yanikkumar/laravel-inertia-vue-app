<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/dashboard', 'Dashboard')->middleware('verified')->name('dashboard');
Route::inertia('/profile', 'Profile/Edit')->middleware(['verified', 'password.confirm'])->name('profile.edit');

require __DIR__ . '/auth.php';