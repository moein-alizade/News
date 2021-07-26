<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show post
    public function show($slug)
    {
// توسط مدل پست اولین رکوردی که عنوانش با عنوان درخواست شده کاربر برابر بود را باز می گرداند
        $post = Post::query()->where('slug', $slug)->firstOrFail();

        return view('post', [
           'post' => $post
        ]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        dd('hi');
    }
}
