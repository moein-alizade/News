<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // show posts
    public function index()
    {
        // گرفتن تمامی پست ها توسط مدل پست
        $post = Post::all();

// دیتا های مد نظرمان را داخل متغیرpost پاس می دهیم
        return view('welcome', [
            'posts' => $post
        ]);
    }
}
