<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }


    public function store(NewPostRequest $request)
    {
        // نمایش تمام اطلاعاتی که می فرستیم
        // dd($request->all());

        // اعتبار سنجی
        // $this->validate(لیست قوانین، داده هایی که کاربر می فرستد);
        //        $this->validate($request, [
        //            // 'unique:post,slug' => فیلد،جدول:یکتا
        //            'slug' => ['required', 'unique:posts,slug'],
        //            'title' => ['required'],
        //            'body' => ['required']
        //        ]);


        // create()  => این تابع برای ایجاد رکورد جدید در دیتابیس هست
        Post::query()->create([
           'slug' => $request->get('slug'),
           'title' => $request->get('title'),
           'body' => $request->get('body'),
        ]);

        // بازگشت به صفحه ریشه
        return redirect('/');
    }


    // show post
    public function show($slug)
    {
// توسط مدل پست اولین رکوردی که عنوانش با عنوان درخواست شده کاربر برابر بود را باز می گرداند
        $post = Post::query()->where('slug', $slug)->firstOrFail();

        return view('post', [
           'post' => $post
        ]);
    }

}
