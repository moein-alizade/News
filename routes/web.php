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



Route::get('/posts/{slug}', function () {

    // dd(request()->all());
    // dd(request('slug'));

    $posts = [
        'first-post' => [
           'title' => 'This is first post',
           'body' => 'This is content'
        ],
        'second-post' => [
           'title' => 'This is second post',
           'body' => 'This is content'
        ]
   ];

    // set variable
    // $post = 'john';
    $post = $posts[request('slug')];


    // نمایش پست بر اساس کلید (عنوان)
    // dd($posts[request('slug')]);

    // compact('name') => پاس دادن متغیر
    // return view('post', compact('name'));

    // return view('post')->with(['name' => $name]);
    // return view('post')->with('name', $name);

    return view('post', [
        // key => value
        // 'name' = key or index => حتما باید هم نام با متغیر که توی ویو مشخص کردیم باشد
        'post' => $post
    ]);
});






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
