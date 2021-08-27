<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Gate::authorize('read-category');
        // $this->authorize('read-category');


        $categories = Category::all();

        return view('categories.index',[
            'categories' => $categories
        ]);
    }


    public function create()
    {

        // Call gate
        // ability = دسترسی
        // dd(Gate::allows('create-category'));


        // if(!Gate::allows('create-category'))
        // {
        //    abort(403);
        // }

        //$this->authorize('create-category');


        // latest() -> بر اساس تاریخ ایجادشون مرتب شوند و جدیدترین کاربر اول و بالاتر قرار بگیرد
        // $user = User::query()->latest()->first();

        // احراز هویت روی کاربری بجز کاربر فعلی مان
        // $this->authorizeForUser($user ,'create-category');


        return view('categories.create');

    }


    public function store(NewCategoryRequest $request)
    {
        //// dd($request);
// ذخیره دسته بندی
        Category::query()->create([
           'title' => $request->get('title')
        ]);


        return redirect('/');
    }




    public function edit(Category $category)
    {

        //        if (!Gate::allows('edit-category', $category)){
        //            abort(403);
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


        //dd($category);

        // authorize() => auto exception = true هویت اش درست هست یا نه
        // Gate::authorize('edit-category', $category);



        // (Gate::check('edit-category', $category) => چک می کند که اون دسترسی برای آن کاربر وجود دارد یا نه
        //        if(!Gate::check('edit-category', $category))
        //        {
        //            abort('403');
        //        }


        // (Gate::any(['edit-category', 'create-category'], $category) => کن true هر کدام از این دسترسی ها رو داشت
        // در صورتی که هیچ کدوم از دسترسی ها رو نداشت، در نهایت نتیجه if = true و کدهاش اجرا بشود
        //        if(!Gate::any(['edit-category', 'create-category'], $category))
        //        {
        //            abort('403');
        //        }



        // (Gate::none(['edit-category'], $category)
        // (Gate::none(['edit-category', 'create-category'], $category) => اگه هیچ کدوم از این دسترسی ها برای کاربر وجود نداشت آنگاه صفحه 403 را نشان بده
        //        if(Gate::none(['edit-category', 'create-category'], $category))
        //        {
        //            abort('403');
        //        }





        $user = User::query()
            ->where('name', 'john')
            ->firstOrFail();


        // (Gate::forUser($user)->none(['edit-category', 'create-category'], $category) =>  احراز هویت روی کاربری غیر از کاربری که لاگین کرده است و اونی که مدنظر ما هست
        if(Gate::forUser($user)->none(['edit-category', 'create-category'], $category))
        {
            abort('403');
        }






        // dd($category);

        return view('categories.edit', [
            'category' => $category
        ]);
    }




    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // authorize() => auto exception = true
        // $this->authorize('edit-category', $category);


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

        // authorization delete category
        // $this->authorize('delete-category', $category);


        $category->delete();

        return redirect('/categories');
    }

}
