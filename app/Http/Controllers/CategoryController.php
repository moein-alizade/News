<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
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
}
