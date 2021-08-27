<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        $categories = Category::all();

        return view('posts.index', [
            'posts' => $post,
            'categories' => $categories
        ]);
    }


    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }


    public function store(NewPostRequest $request)
    {
        Post::query()->create([
           'category_id' => $request->get('category_id'),
           'slug' => $request->get('slug'),
           'title' => $request->get('title'),
           'body' => $request->get('body'),
        ]);

        return redirect('/');
    }


    public function show(Post $post)
    {
        return view('posts.show', [
           'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $slugExists = Post::query()->where('slug', $request->get('slug'))
            ->where('id', '!=', $post->id)
            ->exists();


        if($slugExists)
        {
            return redirect()->back()->withErrors(['slug' => 'the slug already been taken']);
        }


       $post->update([
            'category_id' => $request->get('category_id'),
            'slug' => $request->get('slug'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
       ]);

       return redirect(('/'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

}
