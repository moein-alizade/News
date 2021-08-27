@extends('layout.master')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1 class="m-4"><a href="/roles/create" class="btn btn-success">Add new role</a></h1>
        <table class="table bg-light mx-4 w-25">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role->id}}</th>
                        <td>{{$role->title}}</td>
                        <td>
                            <a href="/roles/{{$role->id}}" class="btn btn-warning btn-sm">Edit</a></td>
                        <td>
                            <form action="/roles/{{$role->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
