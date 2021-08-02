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


Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
// Route::post => قراره فرستاده شود post چون اطلاعات از نوع
Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store']);
// route model binding
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
// patch => موقع آپدیت کردن مقداری، از این متد استفاده می شود
Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);


Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit']);
Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']);


Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']);
Route::post('/register/store', [\App\Http\Controllers\RegisterController::class, 'store']);


Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create']);
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);
