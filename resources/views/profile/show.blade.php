@extends('layout.master')



@section('content')
<div class="row">
    <div class="col sm-12 p-3">
        <h1 class="ml-4">Profile</h1>
        <div class="mt-1 mb-1 ml-4">
            <a href="/profile/edit" class="btn btn-primary">edit your personal data</a>
        </div>
        <p class="pl-4">
            <strong>name :</strong><br>
            {{$user->name}}
        </p>
        <p class="pl-4">
            <strong>email :</strong><br>
            {{$user->email}}
        </p>
        <p class="pl-4">
            <strong>mobile :</strong><br>
            {{$user->mobile}}
        </p>
    </div>
</div>
@endsection
