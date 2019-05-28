 @extends('home.index')
 @section('content1')

 <!-- Page HOME -->
 <div class="demo-section padding-bottom bglight">
     <div class="container">
         <div class="row page" id="page1" style="display: block;">
             @foreach($imageCVs as $imageCV)
             <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 text-center">
                 <div class="single-effect">
                     <figure class="wpf-blog">
                         <a href=""><img src="{{ asset('') }}home_asset/images/cv/{{ $imageCV->name }}_red.png" alt="img" class="CV_image"></a>
                         <figcaption class="view-caption">
                             <a href="{{ url('home/ChosenColor/'.$imageCV->id) }}" target="_blank" class="centered" id="cv1">Use this template</a>
                         </figcaption>
                     </figure>
                     <h3>Creative Resume Templates</h3>
                 </div>
             </div>
             @endforeach
         </div>

         <div class="col-lg-12 text-center">
             <nav aria-label="Page navigation example">
                 {{ $imageCVs->links() }}
             </nav>
         </div>
     </div>
 </div>

 {{-- Pagination --}}
 <script language="javascript">
     var numberOfPages = 5;

     function showPage(number) {
         for (let i = 1; i <= numberOfPages; i++) {
             if (document.querySelector('#page' + i)) {
                 document.querySelector('#page' + i).style.display = 'none';
             }
             if (document.querySelector('#tab' + i)) {
                 document.querySelector('#tab' + i).style.backgroundColor = 'white';
             }
             if (document.querySelector('#page' + number)) {
                 document.querySelector('#page' + number).style.display = 'block';
             }
             if (document.querySelector('#tab' + number)) {
                 document.querySelector('#tab' + number).style.backgroundColor = '#0fb88d';
             }
         }
     }

 </script>
 <script type="text/javascript" src="{{ asset("") }}/home_asset/chosen/js/app.js"></script>

 <!-- /#Demo -->
 @endsection
