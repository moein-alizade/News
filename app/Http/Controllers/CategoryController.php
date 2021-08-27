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
        $categories = Category::all();

        return view('categories.index',[
            'categories' => $categories
        ]);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(NewCategoryRequest $request)
    {
        Category::query()->create([
           'title' => $request->get('title')
        ]);

        return redirect('/');
    }



    public function edit(Category $category)
    {
        $user = User::query()
            ->where('name', 'john')
            ->firstOrFail();


        if(Gate::forUser($user)->none(['edit-category', 'create-category'], $category))
        {
            abort('403');
        }

        return view('categories.edit', [
            'category' => $category
        ]);
    }




    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only(['title']));

        return redirect('/categories');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }

}
