<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;


Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::post('/', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/Students', [AuthManager::class, 'studentLogin'])->name('students');
Route::post('/Students', [AuthManager::class, 'studentLoginpost'])->name('students.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/welcome', [studentController::class, 'read'])->name('reading');
Route::get('/create', [studentController::class, 'create'])->name('creating');
Route::post("/create", [studentController::class, 'createConfirm'])->name('create.confirm');
Route::get('/update{student}', [studentController::class, 'update'])->name('updating');
Route::post("/update{student}", [studentController::class, 'updateConfirm'])->name('update.confirm');
Route::get("/{student}", [studentController::class, 'delete'])->name('deleting');

