<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class,'showLogin'])->name('showLogin');
Route::get('/reg', [AuthController::class,'showReg'])->name('showReg');

Route::post('/reg', [AuthController::class,'reg'])->name('reg');
Route::post('/login', [AuthController::class,'login'])->name('login');

Route::get('/', [AuthController::class,'dashboard'])->name('dashboard');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::post('/todo/create', [TodoController::class,'create'])->name('todo.create');
Route::get('/todo/delete', [TodoController::class,'delete'])->name('todo.delete');