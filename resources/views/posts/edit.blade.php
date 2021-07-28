@extends('layout.master')

@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="/posts/{{   $post->slug   }}" method="POST">
                            @csrf
                            {{-- ست کردن متد دلخواه ما توسط لاراول --}}
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Subject" value="{{   $post->title   }}" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" class="form-control" placeholder="Subject" value="{{   $post->slug   }}" />
                            </div>
                            <div class="form-group">
                                <textarea name="body" class="form-control" rows="5" placeholder="Message">{{   $post->body   }}</textarea>
                            </div>
                            <div><button class="btn" type="submit">Send Message</button></div>
                        </form>



                        @if(count($errors->all()) > 0)
                            <ul class="bg-danger p-3 mt-1">
                                @foreach($errors->all() as $errors)
                                    <li>{{   $errors   }}</li>
                                @endforeach
                            </ul>
                        @endif


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
