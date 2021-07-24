<?php

namespace App\Http\Controllers;

// ایمپورت کلاس هایی که معمولا توی کنترلر ها استفاده می شوند
use App\Models\Post;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // show posts
    // اسم تابع باید گویای کار و وظیفه ی آن باشد
    public function show($slug)
    {

// گرفتن اطلاعات جدول posts از دیتابیس به شرطی که عنوان آن پست برابر با عنوانی که کاربر درخواست داده باشد و اولین رکورد با این ویژگی را باز می گرداند
        // $post = DB::table('posts')->where('slug', $slug)->first();

//        در وقع همان کار کد بالا را با این تفات که از مدل استفاده می شود، انجام می دهد
        // $post = Post::query()->where('slug', $slug)->first();

        // firstOrFail() => اگه پست ما خالی بود، صفحه 404 را نشان بده یا بصورت زیر باید بنویسیم
        // if(empty($post)){
        //   abort(404);
        // }

        $post = Post::query()->where('slug', $slug)->firstOrFail();



        return view('post', [
            // key => value
            // 'name' = key or index => حتما باید هم نام با متغیر که توی ویو مشخص کردیم باشد
            'post' => $post
        ]);

    }
}
