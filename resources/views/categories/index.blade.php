@extends('layout.master')

@section('content')
    <div class="row">
        <div class="flex w-full p-4">
            @can('read-category', \App\Models\Category::class)
                <ul>
                    @foreach($categories as $category)
                        <li class="my-2 text-monospace">{{$category->title}}
                            <a href="/categories/{{$category->id}}/edit" class="w-75 btn btn-primary btn-sm">edit</a></li>

                        <form action="/categories/{{$category->id}}" method="post" class="flex flex-row">
                            @csrf
                            @method('delete')
                            <input type="submit" class="w-75 btn btn-danger btn-sm" value="delete">
                        </form>
                    @endforeach
                </ul>

            @else
                <h1>You can not see this page</h1>
            @endcan
        </div>
    </div>

    @include('layout.errors')

@endsection
