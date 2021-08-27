@extends('layout.master')

@section('content')
<div class="row">
    <div class="col sm-12 p-3">
        <div class="mt-1 mb-1 ml-4">
            <a href="/profile/edit" class="btn btn-primary">Edit your personal data</a>
        </div>

        <h1 class="ml-4 text-center text-info">Profile</h1>
        <p class="pl-4 text-center"><strong>name:  </strong>{{$user->name}}</p>
        <p class="pl-4 text-center"><strong>email:  </strong>{{$user->email}}</p>
        <p class="pl-4 text-center"><strong>mobile:  </strong>{{$user->mobile}}</p>
    </div>
</div>
@endsection
