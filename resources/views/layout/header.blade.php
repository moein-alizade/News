<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap News Template - Free HTML Templates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="/lib/slick/slick.css" rel="stylesheet">
    <link href="/lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Top Bar Start -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tb-contact">
                    <p><i class="fas fa-envelope"></i>info@mail.com</p>
                    <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tb-menu">
                    <a href="">About</a>
                    <a href="">Privacy</a>
                    <a href="">Terms</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar Start -->

<!-- Brand Start -->
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="b-logo">
                    <a href="index.html">
                        <img src="/img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="b-ads">
                    <a href="https://htmlcodex.com">
                        <img src="/img/ads-1.jpg" alt="Ads">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="b-search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu">

                            {{--  @can()   @endcan   =>   بررسی دسترسی ها داخل بلیدها  --}}
                            @can('read-category', \App\Models\Category::class)
                                <a href="/categories" class="dropdown-item">List</a>
                            @endcan

                            @can('create-category', \App\Models\Category::class)
                                <a href="/categories/create" class="dropdown-item">New</a>
                            @endcan

                        </div>
                    </div>



                    <a href="/posts/create" class="nav-item nav-link">New Post</a>




                    {{-- @auth = if   =>       یعنی اگه کاربر لاگین بود فلان کار رو انجام بده و اگه نه فلان کار دیگه را انجام بده                   --}}
                    @auth
                        @canany('manage-roles')
                            <a href="/roles" class="nav-item nav-link">roles</a>
                        @endcanany


                        <a href="/profile" class="nav-item nav-link">Profile</a>
                        <a href="" class="nav-item nav-link">
                            <form action="/logout" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger btn-md" value="logout">
                            </form>
                        </a>
                    @else
                        <a href="/login" class="nav-item nav-link">Login</a>
                    @endauth





                </div>
                <div class="social ml-auto">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
