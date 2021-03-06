<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Set Color For Template</title>
        <script type="text/javascript" src="{{ asset("") }}/home_asset/chosen/js/app.js"></script>

        <!-- Bootstrap -->
        <link href="{{ asset("") }}/home_asset/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font-awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- Bootsnav -->
        <link href="{{ asset("") }}/home_asset/css/bootsnav.css" rel="stylesheet">
        <!-- OWL-Carousel -->
        <link href="{{ asset("") }}/home_asset/css/owl.carousel.css" rel="stylesheet">
        <link href="{{ asset("") }}/home_asset/css/owl.transitions.css" rel="stylesheet">
        <link href="{{ asset("") }}/home_asset/css/animate.min.css" rel="stylesheet">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css/jquery.fancybox.css">
        <!-- Calander -->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css/datepicker.css">
        <!-- Slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css/settings.css">
        <!-- Flip-Pricing -->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css/flip-pricing.css">
        <!-- Custom Style Sheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css/style.css">

        <link rel="shortcut icon" href="{{ asset("") }}/home_asset/images/short_icon.html">
    </head>
    <style>
        center {
            font-size: 35px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 3% auto;
        }

        body {
            color: white;
            background-color: #515D6B;
        }

        h2 {
            padding-top: 5%;
            padding-bottom: 10%;
        }

        .choose {
            padding-bottom: 5%;
        }

        .chosenColor {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            border: 3px solid;
            margin-bottom: 15%;
            ;
        }

        #red {
            background-color: red;
        }

        #blue {
            background-color: blue;
        }

        #green {
            background-color: green;
        }

        #purple {
            background-color: purple;
        }

        #orange {
            background-color: orange;
        }

        #yellow {
            background-color: yellow;
        }

        .chosenColor:hover {
            cursor: pointer;
        }

        .btn-lg {
            margin: 0 25px;
        }

    </style>

    <body>
    @if(session('thongbao'))
        {{-- <div class = "alert alert-success">{{ session('thongbao') }}</div>--}}
        <script>
            alert('{{ session('thongbao') }}');
        </script>
    @endif
        <span>
        <center>Chosen your template color</center>
        </span>
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="single-effect" style="margin-left: 10%;">
                        <img src="{{ asset('') }}home_asset/images/cvs/{{ $imagecvs->name }}_red.png" alt="img" id="image_cv" class="displayImg" alt="this color doesn't exist">
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 text-center">
                    <h2>Set Color</h2>
                    <div class="row">
                        @foreach($colors as $color)
                        <div class="col-lg-4 text-center choose">
                            <div class="chosenColor" style="background-color: {{$color->colorName}}" onclick="chon('{{ $color->colorName}}')"></div>
                            <span class="chosenNameColor">{{$color->colorName}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <div class="ColorSet">
                            <a class="btn btn-danger btn-lg" href="{{ url('') }}" style="float: left;">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <span>Back</span>
                            </a>
                            <form action="{{ route('home.color') }}" method="get" >
                                <input type="hidden" name="CVname" value="{{ $imagecvs->name }}" />
                                <input type="hidden" name="cv_color" id="cv_color" value="red" />
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                                {{--<a id="chosenlink" href="" class="btn btn-success btn-lg create_cv">Create Resume
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>--}}

                                <input type="submit" class="btn btn-success btn-lg create_cv" value="Create Resume">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <script language="javascript">
            function chon(obj) {

                var imgCV = document.querySelector('#image_cv');

                imgCV.src = "{{ asset('') }}home_asset/images/cvs/{{ $imagecvs->name }}_" + obj + ".png";

                var color = document.getElementById('cv_color');
                color.value=obj;
               /* var color = document.getElementById('chosenlink');
                color.href = "{{ url('home/Create/CreateCV/'.$imagecvs->name) }}"+"/"+obj;*/
            }

        </script>


        <script type="text/javascript" src="{{ asset("") }}/home_asset/chosen/js/app.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.2.2.3.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/bootstrap.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/bootsnav.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.appear.js"></script>
        <script src="{{ asset("") }}/home_asset/js/owl.carousel.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.fancybox.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery-countTo.js"></script>
        <script src="{{ asset("") }}/home_asset/js/parallaxie.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.matchHeight-min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/datepicker.js"></script>
        <script src="{{ asset("") }}/home_asset/js/modernizr.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.typewriter.js"></script>
        <script src="{{ asset("") }}/home_asset/js/video.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.themepunch.revolution.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/jquery.themepunch.tools.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/revolution.extension.layeranimation.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/revolution.extension.navigation.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/revolution.extension.parallax.min.js"></script>
        <script src="{{ asset("") }}/home_asset/js/revolution.extension.slideanims.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
        <script src="{{ asset("") }}/home_asset/js/map.js"></script>
        <script src="{{ asset("") }}/home_asset/js/functions.js"></script>
    </body>

</html>
