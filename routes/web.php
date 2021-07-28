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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create']);

// Route::post => قراره فرستاده شود post چون اطلاعات از نوع
Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store']);

// route model binding
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);

// patch => موقع آپدیت کردن مقداری، از این متد استفاده می شود
Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);

Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
