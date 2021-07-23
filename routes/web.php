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

Route::get('/', function () {
    $name = request('name');
    return view('welcome', [
        'name' => $name
    ]);
});



Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class, 'show']);



// action or response => function (){return 'hi';}
Route::get('/hi', function () {

    // dd(request()->all());
    // dd(request('name'));


    // $name = "moein";
    // $_GET => وارد می کند url گرفتن اسم کاربر که خودش توسط
    // $name = $_GET['name'];
    // $age = $_GET['age'];


    // Simplified top code
    $name = request('name');
    $age = request('age');
    return 'hi ' . $name . ' you are ' . $age . " years old";

});
