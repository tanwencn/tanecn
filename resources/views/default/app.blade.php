<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ option('web_name', 'TaneCN') }}</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ theme_url('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ theme_url('font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto-->
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">--}}
<!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{ theme_url('bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ theme_url('owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ theme_url('owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ theme_url('css/style.red.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ theme_url('css/custom.css') }}">
    <!-- Favicon and apple touch icons-->
</head>
<body>
<div id="all">
    @component('top_bar')
        @slot('hide')
            @yield('top_bar')
        @endslot
    @endcomponent

    <!-- Navbar Start-->
    <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
            <div class="container">
                <a href="{{ option('web_url') }}" class="navbar-brand home">
                    <img src="{{ option('web_log', asset('/vendor/laravel-blog/logo2.png')) }}" style="height: 62px;" alt="{{ option('web_name', 'TaneCN') }}" class="d-none d-md-inline-block">
                    <img src="{{ option('web_log', asset('/vendor/laravel-blog/logo2.png')) }}" style="height: 42px;" alt="{{ option('web_name', 'TaneCN') }}" class="d-inline-block d-md-none">
                    <span class="sr-only">{{ option('web_name', 'TaneCN') }}</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation"
                        class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i
                            class="fa fa-align-justify"></i></button>
                <div id="navigation" class="navbar-collapse collapse">
                    {{ Widget::menu(['slug' => 'top']) }}
                </div>
                <div id="search" class="collapse clearfix">
                    <form role="search" class="navbar-form">
                        <div class="input-group">
                            <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End-->

    @component('breadcrumbs')
        @slot('breadcrumb')
            @yield('breadcrumb')
        @endslot
    @endcomponent

    <div id="content">
        <div class="container">
            <div class="row bar">
                @if (isset($errors) && count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div role="alert" class="alert alert-danger col-lg-12">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                @if(session('success'))
                <div role="alert" class="alert alert-success col-lg-12">
                    {{ session('success') }}
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <!-- GET IT-->
    {{--<div class="get-it">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center p-3">
                    <h3>Do you want cool website like this one?</h3>
                </div>
                <div class="col-lg-4 text-center p-3"><a href="#" class="btn btn-template-outlined-white">Buy this
                        template now</a></div>
            </div>
        </div>
    </div>--}}
    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    {{--<h4 class="h6">About Us</h4>--}}
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    <hr>
                    <h4 class="h6">Join Our Monthly Newsletter</h4>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                            </div>
                        </div>
                    </form>
                    <hr class="d-block d-lg-none">
                </div>
                <div class="col-lg-3">
                    {{--<h4 class="h6">Blog</h4>--}}
                    <ul class="list-unstyled footer-blog-list">
                        <li class="d-flex align-items-center">
                            <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                            <div class="text">
                                <h5 class="mb-0"><a href="post.html">Blog post name</a></h5>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                            <div class="text">
                                <h5 class="mb-0"><a href="post.html">Blog post name</a></h5>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                            <div class="text">
                                <h5 class="mb-0"><a href="post.html">Very very long blog post name</a></h5>
                            </div>
                        </li>
                    </ul>
                    <hr class="d-block d-lg-none">
                </div>
                <div class="col-lg-3">
                    {{--<h4 class="h6">Contact</h4>--}}
                    <p class="text-uppercase"><strong>Universal Ltd.</strong><br>13/25 New Avenue <br>Newtown upon River
                        <br>45Y 73J <br>England <br><strong>Great Britain</strong></p><a href="contact.html"
                                                                                         class="btn btn-template-main">Go
                        to contact page</a>
                    <hr class="d-block d-lg-none">
                </div>
                <div class="col-lg-3">
                    <ul class="list-inline photo-stream">
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare2.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare3.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare3.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare2.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#"><img src="img/detailsquare.jpg" alt="..."
                                                                      class="img-fluid"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center-md">
                        <p>&copy; 2018. Your company / name goes here</p>
                    </div>
                    <div class="col-lg-8 text-right text-center-md">
                        <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious
                                Templates </a></p>
                        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Javascript files-->
<script src="{{ theme_url('jquery/jquery.min.js') }}"></script>
<script src="{{ theme_url('popper.js/umd/popper.min.js') }}"></script>
<script src="{{ theme_url('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ theme_url('jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ theme_url('waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ theme_url('jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ theme_url('owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ theme_url('owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
<script src="{{ theme_url('js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ theme_url('bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ theme_url('jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
<script src="{{ theme_url('js/front.js') }}"></script>
@stack('scripts')
</body>
</html>
