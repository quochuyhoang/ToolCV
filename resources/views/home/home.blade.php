 @extends('home.index')
 @section('content1')
 
 <!-- Demo -->
 <div class="demo-section padding-bottom bglight">
 	<div class="container">
 		<div class="row page" id="page1" style="display: block;">
                <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                    <div class="single-effect">
                        <figure class="wpf-blog">
                            <a href=""><img src="{{ asset("") }}home_asset/images/CV1_1.jpg"
                                    alt="img" class="CV_image"></a>
                            <figcaption class="view-caption">
                                <a href="{{ url('home/ChosenColor') }}" target="_blank"
                                    class="centered" id="cv1">Use this template</a>
                            </figcaption>
                        </figure>
                        <h3>Creative Resume Templates</h3>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                    <div class="single-effect">
                        <figure class="wpf-blog">
                            <a href=""><img src="{{ asset("") }}home_asset/images/CV2_1.jpg"
                                    alt="img" class="CV_image"></a>
                            <figcaption class="view-caption">
                                <a href="{{ url('home/ChosenColor') }}" target="_blank"
                                    class="centered" id="cv2">Use this template</a>
                            </figcaption>
                        </figure>
                        <h3>Designer Resume Templates</h3>
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                    <div class="single-effect">
                        <figure class="wpf-blog">
                            <a href=""><img
                                    src="{{ asset('') }}home_asset/images/CV3_1.jpg" alt="img" class="CV_image"></a>
                            <figcaption class="view-caption">
                                <a href="{{ url('home/ChosenColor') }}" target="_blank"
                                    class="centered" id="cv3">Use this template</a>
                            </figcaption>
                        </figure>
                        <h3>Professional Resume Templates</h3>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                    <div class="single-effect">
                        <figure class="wpf-blog">
                            <a href=""><img
                                    src="{{ asset("") }}home_asset/images/CV4_2.jpg" alt="img" class="CV_image"></a>
                            <figcaption class="view-caption">
                                <a href="{{ url('home/ChosenColor') }}" target="_blank"
                                    class="centered" id="cv4">Use this template</a>
                            </figcaption>
                        </figure>
                        <h3>Clean Resume Templates</h3>
                    </div>
                </div>
        </div>
        <div class="row page" id="page2" style="display: none;">
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV1_1.jpg"
                                alt="img" class="CV_image"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 3</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV2_2.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 4</h3>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_2.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Light Version</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_4.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Dark Version</h3>
                </div>
            </div>
        </div>
        <div class="row page" id="page3" style="display: none;">
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV1_1.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 5</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV2_2.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 6</h3>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_2.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Light Version</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_4.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Dark Version</h3>
                </div>
            </div>
        </div>
        <div class="row page" id="page4" style="display: none;">
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV1_1.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 7</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV2_2.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 8</h3>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_2.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Light Version</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_4.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Dark Version</h3>
                </div>
            </div>
        </div>
        <div class="row page" id="page5" style="display: none;">
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV1_1.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 9</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img src="{{ asset("") }}/home_asset/images/CV2_2.jpg"
                                alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Beta 10</h3>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_2.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Light Version</h3>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 text-center">
                <div class="single-effect">
                    <figure class="wpf-blog">
                        <a href=""><img
                                src="{{ asset("") }}/home_asset/images/home_4.jpg" alt="img"></a>
                        <figcaption class="view-caption">
                            <a href="" target="_blank"
                                class="centered">Use this template</a>
                        </figcaption>
                    </figure>
                    <h3>Dark Version</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" id="tab1" href="javascript: onClick=showPage('1')" style="color: black; background-color: #0fb88d;">1</a></li>
                    <li class="page-item"><a class="page-link" id="tab2" href="javascript: onClick=showPage('2')" style="color: black; background-color: white;">2</a></li>
                    <li class="page-item"><a class="page-link" id="tab3" href="javascript: onClick=showPage('3')" style="color: black; background-color: white;">3</a></li>
                    <li class="page-item"><a class="page-link" id="tab4" href="javascript: onClick=showPage('4')" style="color: black; background-color: white;">4</a></li>
                    <li class="page-item"><a class="page-link" id="tab5" href="javascript: onClick=showPage('5')" style="color: black; background-color: white;">5</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script language="javascript">
    var numberOfPages = 5;
    function showPage(number)
    {
        for ( let i=1; i<=numberOfPages; i++)
        {
            if (document.querySelector('#page'+i))
            {
                document.querySelector('#page'+i).style.display = 'none';
            }
            if (document.querySelector('#tab'+i))
            {
                document.querySelector('#tab'+i).style.backgroundColor = 'white';
            }
            if (document.querySelector('#page'+number))
            {
                document.querySelector('#page'+number).style.display = 'block';
            }
            if (document.querySelector('#tab'+number))
            {
                document.querySelector('#tab'+number).style.backgroundColor = '#0fb88d';
            }
        }
    }
    
</script>
<script type="text/javascript" src="{{ asset("") }}/home_asset/chosen/js/app.js"></script>
 			
<!-- /#Demo -->
@endsection
