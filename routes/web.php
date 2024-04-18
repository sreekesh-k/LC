<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DisplayController::class, 'home'])->name('home');

Route::get('/login', [DisplayController::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'login'])->name('login.post');

Route::get('/register', [DisplayController::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'register'])->name('register.post');


Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/reading', [DisplayController::class, 'reading'])->name('reading');

Route::get('/create', [DisplayController::class, 'create'])->name('create');
Route::post('/create', [ItemController::class, 'create'])->name('create.post');

Route::get('/edit/{item}', [DisplayController::class, 'edit'])->name('edit');
Route::post('/edit/{item}', [ItemController::class, 'edit'])->name('edit.post');


Route::get('/delete/{item}', [ItemController::class, 'delete'])->name('delete');
