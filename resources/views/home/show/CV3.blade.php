<!DOCTYPE html>
<html>
    <head>
        <title>cv thu 2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="{{asset('home_asset/cv/cv2/css/cv2.css')}}">
        <style type="text/css">
            .color {
                color: {
                        {
                        $imagecvs->colorCv
                    }
                }

                ;
            }

            .backgroundColor {
                background-color: {
                        {
                        $imagecvs->colorCv
                    }
                }

                ;
            }

        </style>
    </head>

    <body>
        <div class="container template">
            <div class="header" style="background-image: url('{{ asset('home_asset/cv/cv2/images/background_cv2.JPG') }}');">
                <div class="row row-1">
                    <div class="col-md-6 name">

                        <span class="first-name">{{ $imagecvs->CVname }}</span>
                        <span class="job-name backgroundColor" >CREATIVE DESIGN{{ $user_cvs->id }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 info">
                        <div class="media">
                            <img class="mr-3" src="{{ asset('home_asset/cv/cvimages/'.$user_cvs->image) }}" alt="Generic placeholder image">
                            <div class="media-body">
                                <h2 class="mt-0"><i class="fas fa-quote-left color"></i>about us</h2>
                                <span>{{ $user_cvs->target }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 info-right">
                        <div>
                            <img src="images/location.png" alt="" class="location">
                            <span>{{ $user_cvs->user_email }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="test ">
                        <div class="title">
                            <div class="backgroundColor cricle">
                                <img src="images/icon-exp.png" alt="">
                            </div>
                        </div>
                        <h2 class="exp">EXPERIENCE</h2>
                        <div class="last-job">
                            {{-- @foreach ($user_cvs->target as $item)
                            <div class="job-header">
                                <div class="cricle backgroundColor"></div>
                                <h3 class="name">PROJECT MANAGER</h3>
                                <h4 class="time color">2019 to 2020</h4>
                            </div>
                            <div class="job-body">
                                <h4 class="job-location">124 - New York</h4>
                            </div>
                            <div class="job-describer">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi deleniti quidem delectus sed debitis, alias omnis dolores voluptate libero totam laudantium et, quaerat odit! Quidem quos magnam velit dolores quam!
                            </div>
                            @endforeach --}}
                        </div>


                    </div>
                    <div class="test" style="margin-top: 30px">
                        <div class="title">
                            <div class="cricle backgroundColor">
                                <img src="images/icon-exp.png" alt="">
                            </div>
                        </div>
                        <h2 class="exp">OTHER SKILLS</h2>
                        <div class="hobby">
                            <div class="hobby-1">
                                <div class="hobby-title">
                                    <span>{{ $user_cvs->hobbies }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="test">
                        <div class="title">
                            <div class="cricle backgroundColor">
                                <img src="images/eduction-icon.png" alt="">
                            </div>
                        </div>
                        <h2 class="exp">EDUCAITON</h2>
                        <div class="last-job">
                            <div class="job-header">
                                <div class="cricle backgroundColor">

                                </div>
                                <h3 class="name">EDUCATION</h3>
                                <h4 class="time">2019 to 2020</h4>
                            </div>
                            <div class="job-body">
                                <h4 class="job-location">124 - New York</h4>
                            </div>
                            <div class="job-describer">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi deleniti quidem delectus sed debitis, alias omnis dolores voluptate libero totam laudantium et, quaerat odit! Quidem quos magnam velit dolores quam!
                            </div>
                        </div>

                        <div class="last-job">
                            <div class="job-header">
                                <div class="cricle backgroundColor">
                                </div>
                                <h3 class="name">EDUCATION</h3>
                                <h4 class="time">2019 to 2020</h4>
                            </div>
                            <div class="job-body">
                                <h4 class="job-location">124 - New York</h4>
                            </div>
                            <div class="job-describer">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi deleniti quidem delectus sed debitis, alias omnis dolores voluptate libero totam laudantium et, quaerat odit! Quidem quos magnam velit dolores quam!
                            </div>
                        </div>

                    </div>

                    <div class="test" class="test" style="margin-top: 30px">
                        <div class="title">
                            <div class="cricle backgroundColor">
                                <img src="images/pen-icon.png" alt="">
                            </div>
                        </div>
                        <h2 class="exp">PRO SKILLS</h2>

                        <h4>CSS</h4>
                        <div class="progress">
                            <div class="progress-bar backgroundColor" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>
