<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('tasks', TaskController::class);

// Route::view('/users', 'users');

Route::get('/', [AppController::class, 'index']);