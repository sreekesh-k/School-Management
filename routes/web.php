<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::post('/', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/welcome', [ItemController::class, 'read'])->name('reading');
Route::get('/create', [ItemController::class, 'create'])->name('creating');
Route::post("/create", [ItemController::class, 'createConfirm'])->name('create.confirm');
Route::get('/update{item}', [ItemController::class, 'update'])->name('updating');
Route::post("/update{item}", [ItemController::class, 'updateConfirm'])->name('update.confirm');
Route::get("/{item}", [ItemController::class, 'delete'])->name('deleting');