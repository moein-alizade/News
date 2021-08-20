<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // فراخوانی میدلورها
    public function __construct()
    {
        // فقط رو تابع ایندکس وجود دسترسی خواندن دسته بندی را چک کن
        $this->middleware("permission:read-category")
            ->only('index');


        // کاربری بتواند برای تابع store، درخواست بفرستد که دسترسی ایجاد دسته بندی را داشته باشد
        // $this->middleware("permission:create-category")
        //    ->only(['create', 'store']);


        $this->middleware("permission:edit-category")
            ->only(['edit', 'update']);


        $this->middleware("permission:delete-category")
            ->only('destroy');
    }




    public function index()
    {
        return view('categories.index',[
            'categories' => Category::all()
        ]);
    }


    public function create()
    {

        // Call gate
        // ability = دسترسی
        // dd(Gate::allows('create-category'));


        if(!Gate::allows('create-category'))
        {
            return abort(403);
        }

        return view('categories.create');

    }


    public function store(NewCategoryRequest $request)
    {
// ذخیره دسته بندی
        Category::query()->create([
           'title' => $request->get('title')
        ]);

        return redirect('/');
    }




    public function edit(Category $category)
    {
        //        if (!Gate::allows('edit-category', $category)){
        //            return abort(403);
        //        }
        //
        //        return view('categories.edit', [
        //           'category' => $category
        //        ]);



        // Gate::denies('edit-category', $category) = !Gate::allows('edit-category', $category)
        // denies() => !Gate::allows()
        // بررسی می کند که اگه دسترسی وجود ندارد آنگاه نتیجه ی تابع  denies، صحیح خواهد بود و داخل شرط اجرا می شود
        // if (Gate::denies('edit-category', $category)){
        //     return abort(403);
        // }



        // authorize() => auto exception = true هویت اش درست هست یا نه
        Gate::authorize('edit-category', $category);


        return view('categories.edit', [
            'category' => $category
        ]);
    }




    public function update(UpdateCategoryRequest $request, Category $category)
    {

        // authorize() => auto exception = true
        Gate::authorize('edit-category', $category);


        // داخل جدول  category می گردیم که آیا این عنوان قبلا استفاده شده و یا نه و اگه استفاده شده باید برای پستی غیر از پستی که در حال حاضر در حال ویرایش اش هستیم، استفاده شده باشد و اگه نه ارور لازم نیست
        // اگه عنوان فرستاده شده فقط برای پست فعلی وجود داره آنگاه نباید خطای یکتا نبودن عنوان را نشان بدهد
//        $titleExists = Category::query()->where('title', $request->get('title'))
// آیدی برابر نباشد با آیدی پست فعلی مون
//            ->where('id', '!=', $category->id)
//            ->exists();


//        if($titleExists)
//        {
// به صفحه ی قبلی بازگرد و خطای ما را هم اعلان کن
//            return redirect()->back()->withErrors(['title' => 'the title already been taken']);
//        }

//        $category->update([
//           'title' => $request->get('title')
//        ]);


        $category->update($request->only(['title']));


        return redirect('/categories');
    }


    public function destroy(Category $category)
    {
// اگه تعداد پست هایش بزرگتر از 0 بود آنگاه آن را به صفحه ی قبل با خطای مربوطه بر می گردانیم در غیر این صورت آن را پاک می کنیم
        if ($category->posts->count() > 0)
        {
            return back()->withErrors(['category can not be deleted']);
        }

        $category->delete();

        return redirect('/categories');
    }

}
