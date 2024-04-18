<?php

use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DisplayController::class, 'home'])->name('home');
Route::get('/login', [DisplayController::class, 'login'])->name('login');
Route::get('/register', [DisplayController::class, 'register'])->name('register');
