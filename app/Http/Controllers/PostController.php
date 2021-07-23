<?php

namespace App\Http\Controllers;

// ایمپورت کلاس هایی که معمولا توی کنترلر ها استفاده می شوند
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show posts
    // اسم تابع باید گویای کار و وظیفه ی آن باشد
    public function show($slug)
    {
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
        // $post = $posts[request('slug')];
        $post = $posts[$slug];


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
    }
}
