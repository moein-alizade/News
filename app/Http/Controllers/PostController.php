<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
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
    // public function show($slug)
    // Route Model Binding
    public function show(Post $post)
    {
// توسط مدل پست اولین رکوردی که عنوانش با عنوان درخواست شده کاربر برابر بود را باز می گرداند

        // Route model binding => دستور زیر را خودش اجرا می کند
        // $post = Post::query()->where('slug', $slug)->firstOrFail();

        return view('posts.show', [
           'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            // $post => به صفحه ای که مشخص کردیم این متغیر پاس داده می شود
            'post' => $post
        ]);
    }

    // Request $request => داده هایی که کاربر می فرستد
    // Post $post => پاس داده می شود Route model binding و url از طریق
    public function update(UpdatePostRequest $request, Post $post)
    {

// داخل جدول  post می گردیم که آیا این اسلاگ قبلا استفاده شده و یا نه و اگه استفاده شده باید برای پستی غیر از پستی که در حال حاضر در حال ویرایش اش هستیم، استفاده شده باشد و اگه نه ارور لازم نیست
    // اگه اسلاگ فرستاده شده فقط برای پست فعلی وجود داره آنگاه نباید خطای یکتا نبودن اسلاگ را نشان بدهد
        $slugExists = Post::query()->where('slug', $request->get('slug'))
// آیدی برابر نباشد با آیدی پست فعلی مون
            ->where('id', '!=', $post->id)
            ->exists();


        if($slugExists)
        {
// به صفحه ی قبلی بازگرد و خطای ما را هم اعلان کن
            return redirect()->back()->withErrors(['slug' => 'the slug already been taken']);
        }



       $post->update([
            'slug' => $request->get('slug'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
       ]);

       return redirect(('/'));
    }

    public function destroy(Post $post)
    {
        // delete this post
        $post->delete();

        return redirect('/');
    }

}
