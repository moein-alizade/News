<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::middleware('guest')->group(function() {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);

    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('/register/store', [\App\Http\Controllers\RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::delete('/logout', [\App\Http\Controllers\LoginController::class, 'destroy']);
    Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/roles/create', [\App\Http\Controllers\RoleController::class, 'create']);
    Route::post('/roles/store', [\App\Http\Controllers\RoleController::class, 'store']);
    Route::get('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'edit']);
    Route::patch('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'update']);
    Route::delete('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
    Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store']);
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
    Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
    Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create']);
    Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']);
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit']);
    Route::patch('/users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show']);
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit']);
    Route::patch('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update']);
});

Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
