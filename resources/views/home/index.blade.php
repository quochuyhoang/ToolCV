<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CV Tool</title>

        <!-- Bootstrap -->
        <link href="{{asset('') }}home_asset/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font-awesome -->
        <link href="{{asset('') }}home_asset/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootsnav -->
        <link href="{{asset('') }}home_asset/css/bootsnav.css" rel="stylesheet">
        <!-- OWL-Carousel -->
        <link href="{{asset('') }}home_asset/css/owl.carousel.css" rel="stylesheet">
        <link href="{{asset('') }}home_asset/css/owl.transitions.css" rel="stylesheet">
        <link href="{{asset('') }}home_asset/css/animate.min.css" rel="stylesheet">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="{{asset('') }}home_asset/css/jquery.fancybox.css">
        <!-- Calander -->
        <link rel="stylesheet" type="text/css" href="{{asset('') }}home_asset/css/datepicker.css">
        <!-- Slider -->
        <link rel="stylesheet" type="text/css" href="{{asset('') }}home_asset/css/settings.css">
        <!-- Flip-Pricing -->
        <link rel="stylesheet" type="text/css" href="{{asset('') }}home_asset/css/flip-pricing.css">
        <!-- Custom Style Sheet -->
        <link rel="stylesheet" type="text/css" href="{{asset('') }}home_asset/css/style.css">

        <link rel="shortcut icon" href="{{asset('') }}home_asset/images/short_icon.html">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css_form/styles.css">
    </head>
    <style>
        .preview-banner {
            background: url("{{ asset('home_asset/background/laptop1.PNG') }}");
            background-size: cover;
        }

        .btn {
            font-size: 20px;
            color: white;
        }

        .btn:hover {
            color: #0fa784;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .display {
            align-items: center;
        }

        .avatar:hover {
            cursor: pointer;
        }

        a {
            color: white;
        }

    </style>

    <body>
    @if(session('thongbao'))
        {{-- <div class = "alert alert-success">{{ session('thongbao') }}</div>--}}
        <script>
            alert('{{ session('thongbao') }}');
        </script>
    @endif
    @include('home.login')
    @include('home.register')

        <!--Loader-->
        <div id="loader">
            <div class="loader">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>
        </div>
        <!-- Loader end -->

        <!-- Page Banner -->
        <section class="preview-banner" style="padding-top: 50px; padding-bottom: 100px;">
            <div class="pull-right display">
                @guest
                <a  class="btn" data-toggle="modal" data-target="#loginModal">Sign In</a>
                @if (Route::has('register'))
                <a  target="_blank" class="btn" style="margin-right:20px;" data-toggle="modal" data-target="#registerModal">Register</a>
                @endif
                @else
                <span style="font-size:20px;color:white;margin-right:.7rem;">Welcome, {{ Auth::user()->name}}</span>
                <div class="dropdown" style="margin-right:50px;display:inline-block">
                        <img src="{{ asset('assets/img/avatar/'.Auth::user()->avatar)}}" alt="hỏng" style="width:60px;height:60px;border-radius:50%;">
                    <div class="dropdown-content" style="border-radius:5px;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home/profile/'.Auth::user()->id) }}">
                            Profile</a>
                      {{--  @foreach($user_cvs as $usercv)
                        @if($usercv->user_id== Auth::user()->id)
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home/ShowCV/'.$usercv->id) }}">
                            Profile</a>
                        @endif
                        @endforeach--}}

                        <a href="{{ route('home.logout') }}">Log Out</a>
                    </div>
                </div>
                @endguest
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
                        <div class="gradient-banner-detail padding-60-b text-primary">
                            <h2>Resume CV Template</h2>
                            <p>Set up a professional CV resume. Broaden the chance of finding a great job with this well balanced cv template.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #/Page Banner -->

        <div class="heading-section bglight padding-bottom">
            <div class="container">
                <div class="domain_search domain_search_bgw text-center">
                    <div class="col-md-12 text-center heading">
                        <h2 style="padding-bottom: 2rem;">Make Your Resume More Modern!</h2>
                    </div>
                    <p class="content-heading" style="font-size: 20px;">Talent Wins Dev Team offers a great variety of different elements to enhance your resume.</p>
                </div>
            </div>
        </div>
        @yield('content1')


        <!-- Footer -->
        <footer class="site-footer">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="footer-link-bottom">
                            <p>Copyright @ 2019 Talent Wins Devs - Theme by Gosu28</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /#Footer -->
        <!-- BACK TO TOP  -->
        <div class="short-msg">
            <a href="#" class="back-to"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a>

        </div>
        <!-- /#BACK TO TOP -->

        <script src="{{asset('') }}home_asset/js/jquery.2.2.3.min.js"></script>
        <script src="{{asset('') }}home_asset/js/bootstrap.min.js"></script>
        <script src="{{asset('') }}home_asset/js/bootsnav.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.appear.js"></script>
        <script src="{{asset('') }}home_asset/js/owl.carousel.min.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.fancybox.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery-countTo.js"></script>
        <script src="{{asset('') }}home_asset/js/parallaxie.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.matchHeight-min.js"></script>
        <script src="{{asset('') }}home_asset/js/datepicker.js"></script>
        <script src="{{asset('') }}home_asset/js/modernizr.min.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.typewriter.js"></script>
        <script src="{{asset('') }}home_asset/js/video.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.themepunch.revolution.min.js"></script>
        <script src="{{asset('') }}home_asset/js/jquery.themepunch.tools.min.js"></script>
        <script src="{{asset('') }}home_asset/js/revolution.extension.layeranimation.min.js"></script>
        <script src="{{asset('') }}home_asset/js/revolution.extension.navigation.min.js"></script>
        <script src="{{asset('') }}home_asset/js/revolution.extension.parallax.min.js"></script>
        <script src="{{asset('') }}home_asset/js/revolution.extension.slideanims.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
        <script src="{{asset('') }}home_asset/js/map.js"></script>
        <script src="{{asset('') }}home_asset/js/functions.js"></script>
    </body>

</html>
