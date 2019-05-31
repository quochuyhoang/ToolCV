<!DOCTYPE html>
<html>
<head>
	<title>cv thu 3</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	{{--<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv22.css">--}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv3.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css') }}/bootstrap-tagsinput/bootstrap-tagsinput.css" />
	<link href="{{ asset('home_asset/css/plugins/chosen/chosen.css') }}" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style type="text/css">
		input,textarea {
			border: none;
			background-color: transparent;
		}
		.plus-buttom{
			float: right;
		}

		.slider {
			-webkit-appearance: none;
			width: 100%;
			height: 10px;
			border-radius: 5px;
			background: #d3d3d3;
			outline: none;
			opacity: 0.7;
			-webkit-transition: .2s;
			transition: opacity .2s;
		}
		.slider:hover {
			opacity: 1;
		}

		.slider::-webkit-slider-thumb {
			-webkit-appearance: none;
			appearance: none;
			width: 15px;
			height: 15px;
			border-radius: 50%;
			background: #4CAF50;
			cursor: pointer;
		}

		.slider::-moz-range-thumb {
			width: 15px;
			height: 15px;
			border-radius: 50%;
			background: #4CAF50;
			cursor: pointer;
		}
		.header-up{
			z-index: 1;
			 position: absolute;
			background-color: {{ $color->name }};
			opacity: 0.25;
		}

		.color{
			color: {{ $color->name }};
		}
		.backgroundColor{
			z-index: 1;
			background-color: {{ $color->name }};
			opacity: 0.75;
		}
		.backgroundColor input,.backgroundColor textarea {
			text-align: center;
		}
		.backgroundColor input,.backgroundColor textarea{
			@switch($color->name)
                @case('black' && 'purple')
					color:white;
			@break
			@endswitch
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
<div class="container">
	<div class="template">

			<div class="header backgroundColor" style="">
			<div class="avatar">
				<div class="cricle">
					<img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" width="100%" alt="Generic placeholder image">
				</div>
			</div>

			<div class="name">
				<input name="name"  type="text" placeholder="Your Name" value="{{ Auth::user()->name }}">
				<div class="resume">
					<input type="text" name="job-name" placeholder="REsume" class="text-center" style="text-transform: uppercase; color: white">
				</div>
			</div>
			<div class="job-name">
				<input type="text" placeholder="CREATIVE DISGNER" class="text-center" style="text-transform: uppercase; letter-spacing: 15px;width: 100%;">
			</div>
				<div class="job-name">
					<input name="salary" type="number" placeholder="Salary">
				</div>
			<div class="job-demo">
				<textarea name="target" placeholder="Content" rows="5" style="width: 100%;"></textarea>
			</div>

		</div>

		<div class="template-body">
			<div class="row contact">
				<div class="col-md-4 item-contact">

					<i class="fas fa-phone color"></i>


					<div class="contact-title">
						<input name="phone" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}">
					</div>
				</div>

				<div class="col-md-4 item-contact">
					<i class="fas fa-globe-americas color"></i>
					<div class="contact-title">
						<input name="address" placeholder="Your Address" value="{{ Auth::user()->address }}">
					</div>
				</div>

				<div class="col-md-4 item-contact">
					<i class="fas fa-envelope color"></i>
					<div class="contact-title">
						<input name="email" placeholder="Your Address" value="{{ Auth::user()->email }}">

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-7">
					<div class="test">
						<h2 class="exp color">EXPERIENCE</h2>
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
											+'<div class="exp-title">'
											+'<input name="ex_time'+dem+'" type="text" class="color" placeholder="Time">'
											+'</div>'
											+'<div class="exp-content">'
											+'<input name="ex_name'+dem+'" type="text" placeholder="Name Company">'
											+'<input name="ex_position1" type="text" placeholder="Position">'
											+'</div>'
											+'<div class="content">'
											+'<textarea name="ex_describe'+dem+'"  placeholder="Describe" cols="50"></textarea>'
											+'<input name="ex_achiment'+dem+'"  type="text" placeholder="Achiment"><br>'
											+'<input name="ex_reference'+dem+'"  type="text" placeholder="reference Name">'
											+'<input name="ex_rf_phone'+dem+'"  type="text" placeholder="reference phone">'
											+'</div>'
											+'</div>'
									);
									var hide= document.getElementById('ex-hide');
									hide.removeAttribute('hidden');
								}
							</script>
						</div>
						<input name="ex-number" type="hidden" id="ex-number" value="1" />
							<div class="last-job" id="ex">
								<div id="ex-tag1">
									<div class="exp-title">
										<input name="ex_time1" type="text" class="color" placeholder="Time">
									</div>
									<div class="exp-content">
										<input name="ex_name1" type="text" placeholder="Name Company">
										<input name="ex_position1" type="text" placeholder="Position">

									</div>

									<div class="content">
										<textarea name="ex_describe1"  placeholder="Describe" cols="50"></textarea>
										<!--<input name="ex_describe1"  type="text" placeholder="Describe">-->
										<input name="ex_achiment1"  type="text" placeholder="Achiment"><br>
										<input name="ex_reference1"  type="text" placeholder="reference Name">
										<input name="ex_rf_phone1"  type="text" placeholder="reference phone">
									</div>
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
					<div class="test">
						<h2 class="exp color">educations</h2>
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
										+'<div class="exp-title">'
										+'<input name="ed_name'+dem+'" type="text" placeholder="Desired Salary">'
										+'</div>'
										+'<div class="exp-content">'
										+'<input name="ed_time'+dem+'" class="color" type="text" placeholder="Time">'
										+'</div>'
										+'<div class="location">'
										+'<input name="ed_spe'+dem+'" type="text" placeholder="Speciality">'
										+'</div>'
										+'</div>'
								);
								var hide= document.getElementById('edu-hide');
								hide.removeAttribute('hidden');
							}
						</script>
						<div class="last-job" id="edu">
							<input name="edu-number" type="hidden" id="edu-number" value="1">
							<div id="edu-tag1">
									<div class="exp-title">
										<input name="ed_name1" type="text" placeholder="Desired Salary">
									</div>
									<div class="exp-content">
										<input name="ed_time1" class="color" type="text" placeholder="Time">
									</div>
									<div class="location">
										<input name="ed_spe1" type="text" placeholder="Speciality">
									</div>
							</div>
						</div>
						<div style="clear: both;"></div>
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
					<div class="test">
						<h2 class="exp color">awards</h2>
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
										+'<div class="exp-title">'
										+'<input name="aw_time'+dem+'"  class="color" type="text" placeholder="Year">'
										+'</div>'
										+'<div class="exp-content">'
										+'<input name="aw_name'+dem+'"  type="text" placeholder="Name">'
										+'</div>'
										+'<div class="content">'
										+'<textarea name="aw_describe'+dem+'" rows="4" placeholder="Describe" style="width: 100%;"></textarea>'
										+'</div>'
										+'</div>'
								);
								var hide= document.getElementById('aw-hide');
								hide.removeAttribute('hidden');
							}
						</script>

						<div class="last-job" id="aw">
							<input name="aw-number" type="hidden" id="aw-number" value="1">
							<div id="aw-tag1">
									<div class="exp-title">
										<input name="aw_time1"  class="color" type="text" placeholder="Year">
									</div>
									<div class="exp-content">
										<input name="aw_name1"  type="text" placeholder="Name">
									</div>


									<div class="content">
										<textarea name="aw_describe1" rows="4" placeholder="Describe" style="width: 100%;"></textarea>
									</div>

							</div>
						</div>
						<div style="clear: both;"></div>
					</div>


				</div>
				<div class="col-md-5">
					<div class="test" style="margin-bottom: 50px" >
						<h2 class="exp color">PRO SKILLS</h2>
						<input id="skill-level-num" name="skill-level-num" type="hidden" value="0">
						<select data-placeholder="Choose a Skill..." id="select-skill"  class="chosen-select" multiple style="width:350px;" tabindex="4" onchange="chon(this)">
							<p style="color: red" id="show_message"></p>
							@foreach($skills as $skill)
								<option value="{{ $skill->id }}">{{ $skill->name }}</option>
							@endforeach

						</select>
						<div id="result">

						</div>
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
												+'<div class="progress">'
												+'<input type="hidden" name="skill-name'+number+'" value="'+options[i].value+'">'
												+'<input type="range" name="skill-level'+number+'" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">'
												+'</div>'

										number++;
									}
								}
								num.value=number;

								// Gán kết quả vào div#result
								document.getElementById('result').innerHTML = html;
							}
						</script>


						<div style="clear: both;"></div>
					</div>
					<div class="test">
						<h2 class="exp color">hobbies</h2>
						<textarea name="hobbies" cols="45" rows="5"  class="ckeditor" placeholder="Yours hobbies"></textarea>
					</div>
				</div>
			</div>


		</div>
	</div>

</div>
<div style="text-align: center;">
	<input type="hidden" name="imageCV" value="{{ $cv ->id}}">
	<input type="hidden" name="colorCV" value="{{ $color->id }}">
	<input type="submit" class="btn backgroundColor" value="Lưu" />
	<a href="#" class="btn backgroundColor" id="btn-print" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
</div>
</form>

</body>
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
</script>
<script src="{{ asset('js/pdf/html2canvas.js') }}"></script>
<script src="{{ asset('js/pdf/jspdf.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>
</html>