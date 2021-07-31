@extends('layout.master')

@section('content')
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


    @if(count($errors->all()) > 0)
        <ul class="bg-danger p-3 mt-1">
            @foreach($errors->all() as $errors)
                <li>{{   $errors   }}</li>
            @endforeach
        </ul>
    @endif

@endsection
