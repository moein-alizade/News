@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @can('read-category', \App\Models\Category::class)
                <ul>
                    @foreach($categories as $category)
                        <li>{{$category->title}}
                            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-sm">edit</a></li>

                        <form action="/categories/{{$category->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger btn-sm" value="delete">
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
