@extends('layout.master')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1 class="m-4">Roles <a href="/roles/create" class="btn btn-success">Add new role</a></h1>
        <table class="table m-4">
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
                        <td><a href="/roles/{{$role->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td>-</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
