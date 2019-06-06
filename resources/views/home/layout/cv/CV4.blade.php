<!DOCTYPE html>
<html>
<head>
	<title>Create CV</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv22.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv4.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css') }}/bootstrap-tagsinput/bootstrap-tagsinput.css" />
	<link href="{{ asset('home_asset/css/plugins/chosen/chosen.css') }}" rel="stylesheet">
	<style type="text/css">
		#right input,#right textarea{
		@switch($color->name)
			@case('black' && 'purple')
				color:white;
			@break
		@endswitch
		}
		.color{
			color: {{ $color->name }};
		}
		.backgroundColor{
			background-color: {{ $color->name }};
		}
/*		textarea {
    		width: 357px;
		}*/
	</style>
</head>
<body>
@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>

			@endforeach
		</ul>
	</div>
@endif
<form name="create" method="post" action="{{ url('home/Create/Create/'.Auth::user()->id) }}" enctype="multipart/form-data">
	@csrf
	<div class="container template" id="pdf">
	<div class="row ">
		<div class="col-md-4 backgroundColor" id="right">

			<div class="avatar-upload">
				<div class="avatar-edit">
					<input type='file' id="imageUpload" name="newImage" accept=".png, .jpg, .jpeg" />
					<label for="imageUpload"></label>

				</div>
				<div class="avatar-preview">
					<div id="imagePreview" style="background-image:url({{asset('assets/img/avatar/'.Auth::user()->avatar)}});">
					</div>
				</div>
			</div>
			<div class="name">
				<div  class="last-name">
					<input name="name"  type="text" placeholder="Your Name" value="{{ Auth::user()->name }}" >
					<input name="job-name" type="text" id="jobName" placeholder="Wanted job">
					<input name="salary" type="number" placeholder="Salary" max="100000000">
				</div>
			</div>
			<div class="info-cv">
				<div class="info-title">
					<span>about me</span>
				</div>
				<div class="info-content">
					<textarea name="target" cols="35" rows="5"  class="ckeditor" placeholder="About You"></textarea>
				</div>
			</div>
			<div class="info-cv">
				<div class="info-title">
					<span>contact me</span>
				</div>
				<div class="info-content">
					<div>
						<input name="address"  placeholder="Your Address" value="{{ Auth::user()->address }}">
					</div><br>
					<div>
						<input name="phone" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}">
					</div><br>
					<div>
						<input name="email" placeholder="Your Address" value="{{ Auth::user()->email }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="left">
				<div class="left-title">
					<h3 class="color">work experience</h3>
				</div>
				<div class="plus-buttom">
					<a  onclick="addEx()" title="More Experience">
						<i class="fa fa-plus"></i>
					</a>
					<script type="text/javascript" >
						function addEx() {
							var get= document.getElementById('ex-number');
							var dem= parseInt(get.value)+1;
							get.value= dem;

							var x= $("#ex");
							x.append('<div id="ex-tag'+dem+'">'
									+'<hr>'
									+'<h4><input name="ex_name1" type="text" placeholder="Name Company"></h4>'
									+'<h5><input name="ex_time1" type="text" class="color" placeholder="Time"></h5>'
									+'<h6><input name="ex_position1" type="text" placeholder="Position"></h6>'
									+'<textarea name="ex_describe1"  placeholder="Describe" cols="50"></textarea>'
									+'<input name="ex_achiment1"  type="text" placeholder="Achiment"><br>'
									+'<input name="ex_reference1"  type="text" placeholder="reference Name">'
									+'<input name="ex_rf_phone1"  type="text" placeholder="reference phone">'
									+'</div>'
							);
							var hide= document.getElementById('ex-hide');
							hide.removeAttribute('hidden');
						}
					</script>
				</div>
				<input name="ex-number" type="hidden" id="ex-number" value="1" />

				<div class="left-content" id="ex">
					<div id="ex-tag1">
					<h4><input name="ex_name1" type="text" placeholder="Name Company"></h4>
					<h5><input name="ex_time1" type="text" class="color" placeholder="Time"></h5>
					<h6><input name="ex_position1" type="text" placeholder="Position"></h6>
					<textarea name="ex_describe1"  placeholder="Describe" cols="50"></textarea>
					<!--<input name="ex_describe1"  type="text" placeholder="Describe">-->
					<input name="ex_achiment1"  type="text" placeholder="Achiment"><br>
					<input name="ex_reference1"  type="text" placeholder="reference Name">
					<input name="ex_rf_phone1"  type="text" placeholder="reference phone">
					</div>
				</div>
				<div class="plus-buttom"  id="ex-hide" hidden>
					<a  onclick="hideEX()" title="More Experience">
						<i class="fa fa-times"></i>
					</a>
					<script>
						function hideEX() {
							var get= document.getElementById('ex-number');
							var parent = document.getElementById("ex");
							var child = document.getElementById('ex-tag'+get.value);
							parent.removeChild(child);

							var dem= parseInt(get.value)-1;
							if(dem===1){
								$('#ex-hide').createAttribute('hidden');
							}
							get.value= dem;
						}
					</script>
				</div>


			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">education</h3>
				</div>
				<div class="plus-buttom">
					<a  onclick="edu()" >
						<i class="fa fa-plus"></i>
					</a>
				</div>
				<script type="text/javascript" >
					function edu() {
						var get= document.getElementById('edu-number');
						var dem= parseInt(get.value)+1;
						get.value= dem;

						var x= $("#edu");
						x.append('<div id="edu-tag'+dem+'">'
								+'<hr>'
								+'<h4><input name="ed_name1" type="text" placeholder="Name School"></h4>'
								+'<h5><input name="ed_time1" class="color" type="text" placeholder="Time"></h5>'
								+'<h6><input name="ed_spe1" type="text" placeholder="Speciality"></h6>'
								+'</div>'
						);
						var hide= document.getElementById('edu-hide');
						hide.removeAttribute('hidden');
					}
				</script>
				<input name="edu-number" type="hidden" id="edu-number" value="1">
				<div class="left-content" id="edu">
					<div id="edu-tag1">
					<h4><input name="ed_name1" type="text" placeholder="Name School"></h4>
					<h5><input name="ed_time1" class="color" type="text" placeholder="Time"></h5>
					<h6><input name="ed_spe1" type="text" placeholder="Speciality"></h6>
					</div>
				</div>
				<div class="plus-buttom" id="edu-hide" hidden>
					<a  onclick="hideEdu()" title="Hide this Education">
						<i class="fa fa-times"></i>
					</a>
					<script>
						function hideEdu() {
							var get= document.getElementById('edu-number');
							var parent = document.getElementById("edu");
							var child = document.getElementById('edu-tag'+get.value);
							parent.removeChild(child);
							var dem= parseInt(get.value)-1;
							if(dem===1){
								$('#edu-hide').createAttribute('hidden');
							}
							get.value= dem;
						}
					</script>
				</div>
			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">Awards</h3>
				</div>
				<div class="plus-buttom">
					<a  onclick="aw()" >
						<i class="fa fa-plus"></i>
					</a>
				</div>
				<script type="text/javascript" >
					function aw() {
						var get= document.getElementById('aw-number');
						var dem= parseInt(get.value)+1;
						get.value= dem;

						var x= $("#aw");
						x.append('<div id="aw-tag'+dem+'">'
								+'<hr>'
								+'<h4><input name="aw_name'+dem+'"  type="text" placeholder="Name"></h4>'
								+'<h5><input name="aw_time'+dem+'"  class="color" type="text" placeholder="Year"></h5>'
								+'<h6><input name="aw_describe'+dem+'"  type="text" placeholder="Describe"></h6>'
								+'</div>'
						);
						var hide= document.getElementById('aw-hide');
						hide.removeAttribute('hidden');
					}
				</script>
				<input name="aw-number" type="hidden" id="aw-number" value="1">
				<div class="left-content" id="aw">
					<div id="aw-tag1">
					<h4><input name="aw_name1"  type="text" placeholder="Name"></h4>
					<h5><input name="aw_time1"  class="color" type="text" placeholder="Year"></h5>
					<h6><input name="aw_describe1"  type="text" placeholder="Describe"></h6>
					</div>
				</div>
				<div class="plus-buttom" id="aw-hide" hidden>
					<a  onclick="hideAw()" title="Hide this Education">
						<i class="fa fa-times"></i>
					</a>
					<script>
						function hideAw() {
							var get= document.getElementById('aw-number');
							var parent = document.getElementById("aw");
							var child = document.getElementById('aw-tag'+get.value);
							parent.removeChild(child);
							var dem= parseInt(get.value)-1;
							if(dem===1){
								$('#aw-hide').createAttribute('hidden');
							}
							get.value= dem;
						}
					</script>
				</div>
			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">persional skills</h3>
					<select data-placeholder="Choose a Skill..." id="select-skill"  class="chosen-select" multiple style="width:350px;" tabindex="4" onchange="chon(this)">
						<p style="color: red" id="show_message"></p>
						@foreach($skills as $skill)
							<option value="{{ $skill->id }}">{{ $skill->name }}</option>
						@endforeach

					</select>
					<input id="skill-level-num" name="skill-level-num" type="hidden" value="0">
					{{--<div id="chon">
						<select name="select">
							@for($i=10; $i<=100;$i+=10)
								<option value={{ $i }}>{{ $i }}%</option>
							@endfor
						</select>
					</div>--}}
					<script>
						function chon(obj)
						{
							var num = document.getElementById('skill-level-num');
							var options = obj.children;

							// Biến lưu trữ các chuyên mục đa chọn
							var html = '';
							var number=0;
							// lặp qua từng option và kiểm tra thuộc tính selected
							for (var i = 0; i < options.length; i++){
								if (options[i].selected){
									html += '<h4>'+options[i].text+'</h4>'
											+'<input type="hidden" name="skill-name'+number+'" value="'+options[i].value+'">'
											+' <input type="range" name="skill-level'+number+'" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">'
									/* +'<div class="progress">'
                                        +'<div class="progress-bar backgroundColor" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>'
                                        +'</div><br>'*/
									number++;
								}
							}
							num.value=number;

							// Gán kết quả vào div#result
							document.getElementById('result').innerHTML = html;
						}
					</script>
				</div>
				<div class="" id="result">

				</div>
			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">interes/hobby</h3>
				</div>
				<div class="left-content hobby">
					<textarea name="hobbies" cols="100" rows="5"  class="ckeditor" placeholder="Yours hobbies"></textarea>
				</div>

			</div>
		</div>
	</div>
</div>

	<div style="text-align: center;">
		<input type="hidden" name="imageCV" value="{{ $cv ->id}}">
		<input type="hidden" name="colorCV" value="{{ $color->id }}">
{{-- 		<input type="submit" class="btn backgroundColor" value="Lưu" /> --}}
		<a type="submit" class="btn backgroundColor" style="color: #007bff">Lưu</a>
		<a href="#" class="btn backgroundColor" id="btn-print" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
	</div>
</form>
<script>
	$(document).ready(function(){


		$('.chosen-select').chosen({width: '100%'});



		var area_print = $('#area-print');

		var a4 =[ 595.28, 841.89];
		$('#btn-print').on('click',function(){
			print();
		});
		function print() {
			html2canvas(document.getElementById('pdf'), {

				onrendered: function(canvas){
					var img= canvas.toDataURL("image/png");
					doc = new jsPDF();
					doc.addImage(img,'JPEG',0,0,210, 297);
					doc.save('CV.pdf');
				}
			});
		};



	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imagePreview').css('background-image', 'url('+e.target.result +')');


			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	var upload = document.querySelector('#imageUpload');

	upload.onchange = function() {

		readURL(this);
	};

</script>
	<script src="{{ asset('js/pdf/html2canvas.js') }}"></script>
	<script src="{{ asset('js/pdf/jspdf.js') }}"></script>

<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>

</body>
</html>