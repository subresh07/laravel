<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');
Route::get('/parties/create', [AppController::class, 'create'])->name('parties.create');
Route::post('/parties', [AppController::class, 'store'])->name('parties.store');
Route::get('/parties/{party}', [AppController::class, 'show'])->name('parties.show');
Route::get('/parties/{party}/edit', [AppController::class, 'edit'])->name('parties.edit'); // Edit form
Route::put('/parties/{party}', [AppController::class, 'update'])->name('parties.update'); // Update party
Route::delete('/parties/{party}', [AppController::class, 'destroy'])->name('parties.destroy'); // Soft delete party