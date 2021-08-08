<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);


Route::middleware('guest')->group(function() {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);

    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('/register/store', [\App\Http\Controllers\RegisterController::class, 'store']);
});


Route::middleware('auth')->group(function() {
    // logout => session حذف
    Route::delete('/logout', [\App\Http\Controllers\LoginController::class, 'destroy']);

    // show list roles
    Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/roles/create', [\App\Http\Controllers\RoleController::class, 'create']);
    Route::post('/roles/store', [\App\Http\Controllers\RoleController::class, 'store']);
    Route::get('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'edit']);
    Route::patch('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'update']);
    Route::delete('/roles/{role}', [\App\Http\Controllers\RoleController::class, 'destroy']);


    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
// Route::post => قراره فرستاده شود post چون اطلاعات از نوع
    Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store']);
// route model binding
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
// patch => موقع آپدیت کردن مقداری، از این متد استفاده می شود
    Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
    Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);


    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create']);
    Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']);


    // Users list
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    // تغییر اطلاعات کاربران
    Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit']);
// آپدیت اطلاعات کاربر
    Route::patch('/users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
// حذف اطلاعات کاربر
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);



    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show']);
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit']);
    Route::patch('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update']);
});


Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
