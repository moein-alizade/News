@extends('layout.master')

@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="/users/{{$users->id}}" method="POST">
                            @csrf
                            @method('patch')
                            <h2>edit {{$users->name}} Role</h2>
                            <div class="form-group col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Title" value="{{$users->name}}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Title" value="{{$users->email}}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="mobile" class="form-control" placeholder="Title" value="{{$users->mobile}}"/>
                            </div>

                            <div class="form-group col-md-12">
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option
                                            @if($users->role_id == $role->id)
                                                selected
                                            @endif
                                            value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div><button class="btn" type="submit">Submit</button></div>
                        </form>

                        @include('layout.errors')

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                        </p>
                        <h4><i class="fa fa-map-marker"></i>123 News Street, NY, USA</h4>
                        <h4><i class="fa fa-envelope"></i>info@example.com</h4>
                        <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
