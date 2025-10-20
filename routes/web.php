<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', \App\Http\Controllers\UserController::class);

/*
Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create']);

Route::get('/users/edit', [\App\Http\Controllers\UserController::class, 'edit']);
// User Store
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.create');

// User Show For Edit

// User Update
Route::post('/users/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('users.edit');*/
