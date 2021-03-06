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
			@switch($color->name)
			@case('black' && 'purple')
				color:white;
			@break
		    @endswitch
		}
		input, textarea {
			border: none;
			border-bottom: 1px solid;
			margin-bottom: 3%;
			background-color: transparent;
		}

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
				<div class="avatar-edit hide-option">
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
					<input name="name"  type="text" placeholder="Your Name" value="{{ Auth::user()->name }}" style="text-align:center;text-transform:capitalize;">
					<input name="job-name" type="text" id="jobName" placeholder="Wanted job" style="text-align:center;text-transform:capitalize;">
					<input name="salary" type="number" placeholder="Salary" max="100000000" style="font-size:18px;text-align:center;width:35%;">
				</div>
			</div>
			<div class="info-cv">
				<div class="info-title">
					<span>about me</span>
				</div>
				<div class="info-content">
					<textarea name="target" cols="35" rows="5"  class="ckeditor" placeholder="About You" style="border-bottom:1px solid;"></textarea>
				</div>
			</div>
			<div class="info-cv">
				<div class="info-title mb-4">
					<span>contact me</span>
				</div>
				<div class="info-content">
					<div>
						<input name="address" class="text-center" placeholder="Your Address" value="{{ Auth::user()->address }}">
					</div><br>
					<div>
						<input name="phone" class="text-center" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}">
					</div><br>
					<div>
						<input name="email" class="text-center" placeholder="Your Address" value="{{ Auth::user()->email }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 pt-4">
			<div class="left">
				<div class="left-title">
					<h3 class="color">work experience</h3>
				</div>
				<div class="plus-buttom hide-option">
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
									+'<div><input name="ex_name'+dem+'" type="text" placeholder="Name Company" style="width:75%;"></div>'
									+'<div><input name="ex_time'+dem+'" type="text" class="color" placeholder="Time" style="width:20%;"></div>'
									+'<div><input name="ex_position'+dem+'" type="text" placeholder="Position" style="width:30%;"></div>'
									+'<div><textarea name="ex_describe'+dem+'"  placeholder="Describe" rows="3" style="width:45%;margin-right:5%;border-bottom:1px solid;"></textarea>'
									+'<textarea name="ex_achiment'+dem+'" placeholder="Achievement" rows="3" style="width:45%;border-bottom:1px solid"></textarea></div>'
									+'<input name="ex_reference'+dem+'"  type="text" placeholder="reference Name" style="margin-right:5%;">'
									+'<input name="ex_rf_phone'+dem+'" type="text" placeholder="reference phone">'
									+'</div>'
							);
							$('#ex-hide').show();
							var hide= document.getElementById('ex-hide');
							hide.removeAttribute('hidden');
						}
					</script>
				</div>
				<input name="ex-number" type="hidden" id="ex-number" value="1" />

				<div class="left-content" id="ex">
					<div id="ex-tag1">
            <div><input name="ex_name1" type="text" placeholder="Name Company" style="width:75%;"></div>
            <div><input name="ex_time1" type="text" class="color" placeholder="Time" style="width:20%;"></div>
            <div><input name="ex_position1" type="text" placeholder="Position" style="width:30%;"></div>
            <div><textarea name="ex_describe1" placeholder="Describe" rows="3" style="width:45%;margin-right:5%;border-bottom:1px solid;"></textarea>
            <textarea name="ex_achiment1" placeholder="Achievement" rows="3" style="width:45%;border-bottom:1px solid"></textarea></div>
            <input name="ex_reference1"  type="text" placeholder="reference Name" style="margin-right:5%;">
            <input name="ex_rf_phone1"  type="text" placeholder="reference phone">
					</div>
				</div>
				<div class="plus-buttom hide-option"  id="ex-hide" hidden>
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
							get.value= dem;
							if(dem===1){
								$('#ex-hide').hide();
							}

						}
					</script>
				</div>


			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">education</h3>
				</div>
				<div class="plus-buttom hide-option">
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
								+'<input name="ed_name'+dem+'" type="text" placeholder="Name School" style="width:70%;"><br>'
								+'<input name="ed_time'+dem+'" class="color" type="text" placeholder="Time" style="width:20%;"><br>'
								+'<input name="ed_spe'+dem+'" type="text" placeholder="Speciality" style="width:30%;">'
								+'</div>'
						);
						$('#edu-hide').show();
						var hide= document.getElementById('edu-hide');
						hide.removeAttribute('hidden');
					}
				</script>
				<input name="edu-number" type="hidden" id="edu-number" value="1">
				<div class="left-content" id="edu">
					<div id="edu-tag1">
					<input name="ed_name1" type="text" placeholder="Name School" style="width:70%;"><br>
					<input name="ed_time1" class="color" type="text" placeholder="Time" style="width:20%;"><br>
					<input name="ed_spe1" type="text" placeholder="Speciality" style="width:30%;">
					</div>
				</div>
				<div class="plus-buttom hide-option" id="edu-hide" hidden>
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
							get.value= dem;
							if(dem===1){
								$('#edu-hide').hide();
							}

						}
					</script>
				</div>
			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">Awards</h3>
				</div>
				<div class="plus-buttom hide-option">
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
						x.append('<div class="col-lg-6" id="aw-tag'+dem+'">'
								+'<hr>'
								+'<input name="aw_name'+dem+'"  type="text" placeholder="Name" style="width:90%;"><br>'
								+'<input name="aw_time'+dem+'"  class="color" type="text" placeholder="Year" style="width:35%;"><br>'
								+'<input name="aw_describe'+dem+'"  type="text" placeholder="Describe" style="width:60%;">'
								+'</div>'
						);
						$('#aw-hide').show();
						var hide= document.getElementById('aw-hide');
						hide.removeAttribute('hidden');

					}
				</script>
				<input name="aw-number" type="hidden" id="aw-number" value="1">
				<div class="left-content" id="aw">
					<div class="col-lg-6" id="aw-tag1">
					  <input name="aw_name1"  type="text" placeholder="Name" style="width:90%;"><br>
					  <input name="aw_time1"  class="color" type="text" placeholder="Year" style="width:35%;"><br>
				    <input name="aw_describe1"  type="text" placeholder="Describe" style="width:60%;">
					</div>
				</div>
				<div class="plus-buttom hide-option" id="aw-hide" hidden>
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
							get.value= dem;
							if(dem===1){
								$('#aw-hide').hide();
							}

						}
					</script>
				</div>
			</div>
			<div class="left">
				<div class="left-title">
					<h3 class="color">persional skills</h3>
					<div class="hide-option">
					<select data-placeholder="Choose a Skill..." id="select-skill"  class="chosen-select" multiple style="width:350px;" tabindex="4" onchange="chon(this)">
						<p style="color: red" id="show_message"></p>
						@foreach($skills as $skill)
							<option value="{{ $skill->id }}">{{ $skill->name }}</option>
						@endforeach

					</select>
					</div>
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
									number++;
									html += '<h4>'+options[i].text+'</h4>'
											+'<input type="hidden" name="skill-name'+number+'" value="'+options[i].value+'">'
											+' <input type="range" name="skill-level'+number+'" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">'
									/* +'<div class="progress">'
                                        +'<div class="progress-bar backgroundColor" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>'
                                        +'</div><br>'*/

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
					<textarea name="hobbies" cols="100" rows="5"  class="ckeditor" placeholder="Yours hobbies" style="border-bottom:1px solid;"></textarea>
				</div>

			</div>
		</div>
	</div>
	</div>

	<div style="text-align: center;margin-bottom:3%;" class="hide-option">
		<input type="hidden" name="imageCV" value="{{ $cv ->id}}">
		<input type="hidden" name="colorCV" value="{{ $color->id }}">
		<input type="submit" class="btn backgroundColor" value="Lưu" style="margin: 0;" />
		{{--<a type="submit" class="btn backgroundColor" style="color: #007bff">Lưu</a>--}}
		<a href="#" class="btn backgroundColor" id="savePDF" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
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
	$('#savePDF').click(function(){
		$('.hide-option').hide();
		$('input').css('border-bottom', 'none');
		$('textarea').css('border-bottom', 'none');
		window.print();
	});

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