@extends('layout.master')

@section('content')
    <ul>
        @foreach($categories as $category)
            <li>{{$category->title}} <a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-sm">edit</a></li>
        @endforeach
    </ul>
@endsection
