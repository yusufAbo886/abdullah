<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <!-- Required Meta Tags Always Come First -->
    <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title> dsfew</title>


    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/font-awesome.min.css') }}">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet"  href="{{ asset('asset/revolution/css/settings.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/revolution/css/layers.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/revolution/css/navigation.css') }}">

    <!-- ARCHIVES CSS -->

    <link rel="stylesheet"  href="{{ asset('asset/css/animate.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/magnific-popup.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/lightcase.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet"  href="{{ asset('asset/css/styles.css') }}">

{{--  github icon--}}
    <link href="{{ asset('assets/iconpicker/dist/fontawesome-5.11.2/css/all.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/iconpicker/dist/iconpicker-1.5.0.css') }}" rel="stylesheet" />




</head>

<body class="inner-pages">

<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-info hidden-sm-down">
                <div class="call-header">
                    <p><i class="fa fa-phone" aria-hidden="true"></i> (234) 0200 17813</p>
                </div>
                <div class="address-header">
                    <p>

                       <i class="fa fa-map-marker" aria-hidden="true"></i> 95 South Park Ave, USA
                    </p>
                </div>
                <div class="mail-header">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> info@findhouses.com</p>
                </div>
            </div>
            <div class="top-social hidden-sm-down">
                <div class="login-wrap">
                    <ul class="d-flex">
                        <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        <li><a href="#"><i class="fa fa-sign-in"></i> Register</a></li>
                    </ul>
                </div>
                <div class="social-icons-header">
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">
                        <img src="{{ asset('asset/images/en.png') }}" alt="lang" /> English
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownlang">
                        <li><img src="{{ asset('asset/images/fr.png') }}" alt="lang" />France</li>

                        <li><img src="{{ asset('asset/images/de.png') }}" alt="lang" /> German</li>
                        <li><img src="{{ asset('asset/images/it.png') }}" alt="lang" />Italy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom heading sticky-header" id="heading">
        <div class="container">
            <a href="index.html" class="logo">

                <img src="{{asset('asset/images/broks.jpg')}}" alt="realhome">
            </a>
            <button type="button" class="search-button" data-toggle="collapse" data-target="#bloq-search" aria-expanded="false">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>

            <button type="button" class="button-menu hidden-lg-up" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <form action="#" id="bloq-search" class="collapse">
                <div class="bloq-search">
                    <input type="text" placeholder="search...">
                    <input type="submit" value="Search">
                </div>
            </form>

            <nav id="main-menu" class="collapse">
                <ul>
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li class="hidden-lg-up" ><a href="contact-us.html">Home</a></li>

                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="dropdown hidden-md-down"><a href="contact-us.html">Home</a></li>

                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li class="hidden-lg-up" ><a href="contact-us.html">About Us</a></li>

                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="dropdown hidden-md-down"><a href="contact-us.html">About Us</a></li>



                    <li class="hidden-lg-up">
                        <div class="po">
                            <a data-toggle="collapse" href="#about" aria-expanded="false">Pages</a>
                        </div>
                        <div class="collapse" id="about">
                            <div class="card card-block">
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="about.html">{{$category->theNameEn}}</a>
                                @endforeach

                            </div>
                        </div>
                    </li>
                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="dropdown hidden-md-down">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Our Service</a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{$category->url}}">{{$category->theNameEn}}</a>
                            @endforeach
                        </div>
                    </li>
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li class="hidden-lg-up" ><a href="/doctors">Doktor</a></li>

                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="dropdown hidden-md-down"><a href="/doctors">Doktor</a></li>
                    <li class="hidden-lg-up" ><a href="/blog">Blog</a></li>

                    <!-- END COLLAPSE MOBILE MENU -->
                    <li class="dropdown hidden-md-down"><a href="/blog">Blog</a></li>
                    <!-- STAR COLLAPSE MOBILE MENU -->
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
