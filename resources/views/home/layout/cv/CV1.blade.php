<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create CV</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/css/cv/style2.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('home_asset/css/plugins/chosen/chosen.css') }}" rel="stylesheet">

	<style type="text/css">
		.container{
			background: #fafbfb;
			color: #414142;
		}
		.left{
			background-image: url('{{ asset('css/cv/images/cv1/') }}/Shape.jpg');
			background-size: 300px 1000px;
			padding: 0;
		}
		.left1{
			background: rgba(246, 235, 20, 0.6);
		}
		.color{
			color: {{ $color->name }};
		}
		.backgroundColor{
			background-color: {{ $color->name }};
		}
		.left input{
			text-align: center;
		}
		.plus-buttom{
			margin-top: -5%;
			float: right;
		}
		input,textarea {
			border: none;
			border-bottom: 1px solid;
			margin-bottom: 2%;
			background-color: transparent;
		}
		.backgroundColor input,.backgroundColor textarea{
			@switch($color->name)
			@case('black' && 'purple' && 'red')
			color:white;
			@break
			@endswitch
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
			<div class="row">
				<div class="left col-md-4">
					<div class="left1 backgroundColor">
						<div class="steven"><input name="name"  type="text" placeholder="Your Name" value="{{ Auth::user()->name }}" style="background-color: transparent;"></div>
						<div class="">
							<div class="avatar-upload">
								<div class="avatar-edit">
									<input type='file' id="imageUpload" name="newImage" accept=".png, .jpg, .jpeg" />
									<label for="imageUpload"></label>

								</div>
								<div class="avatar-preview">
									<div id="imagePreview" style="background-image:url({{asset('assets/img/avatar/'.Auth::user()->avatar)}});">
									</div>
								</div>
								<script>
									function readURL(input) {
										if (input.files && input.files[0]) {
											var reader = new FileReader();
											reader.onload = function(e) {
												$('#imagePreview').css('background-image', 'url('+e.target.result +')');


											}
											reader.readAsDataURL(input.files[0]);
										}
									}
								</script>
							</div>
						</div>
						<div class="graphic">	<input name="job-name" type="text" id="jobName" placeholder="Wanted job" style="background-color: transparent;margin-bottom: 2%;border-bottom: 1px solid white;text-transform: uppercase;color: white;"><br>
							<input name="salary" type="number" placeholder="Salary" max="100000000" style="background-color: transparent;"></div>
							<div class="icon">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="myname">
								<textarea name="target" cols="30" rows="5"  class="ckeditor" placeholder="About You" style="background-color: transparent;border-bottom: 1px solid;"></textarea>
							</div>
						</div>
						<div class="left2">
							<div class="contact color">CONTACT</div>
							<div class="icon1 icon_left2">
								<div class="layer">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 2-min.png" alt="">
								</div>
								<span class="text_layer"><input name="address" placeholder="Your Address" value="{{ Auth::user()->address }}" style="background-color: transparent;">
								</span>
							</div>
							<div class="icon2 icon_left2">
								<div class="layer layer1">
									<img src="{{ asset('css/cv/images/cv1/') }}/phone-min.png" alt="">
								</div>
								<span class="sdt" ><input name="phone" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}" style="background-color: transparent;"></span><br>

							</div>
							<div class="icon3 icon_left2">
								<div class="layer layer1">
									<img src="{{ asset('css/cv/images/cv1/') }}/mouse-min.png" alt="">
								</div>
								<span class="text_layer-min">
									<input name="email" placeholder="Your Address" value="{{ Auth::user()->email }}" style="background-color: transparent;">
								</span>
							</div>
						</div>

					</div>
					<div class="right col-md-7 offset-md-1">

						<div class="right1">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 6-min.png">
								</div>
								<span class="contact contact01 color"> EXPERIENCE</span>
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
											+'<div class="wordpress">'
											+'<span class="list"><input name="ex_name1" type="text" placeholder="Name Company" style="width: 70%;font-size: 25px;"></span>'
											+'<span class="nam"><input name="ex_time1" type="text" class="color" placeholder="Time" style="width: 20%;"></span><br>'
											+'<input name="ex_position1" type="text" placeholder="Position" style="font-size: 23px;">'
											+'</div>'
											+'<div class="content">'
											+'<p class="text_max"><input name="ex_achiment1"  type="text" placeholder="Achiment" style="font-size: 20px;"></p>'
											+'<textarea name="ex_describe1"  placeholder="Describe" cols="50" style="border-bottom: 1px solid" style="font-size: 20px;"></textarea><br>'
											+'<input name="ex_reference1"  type="text" placeholder="reference Name" style="font-size: 18px;">'
											+'<input name="ex_rf_phone1"  type="text" placeholder="reference phone"  style="margin-left: 5%;font-size: 18px;">'
											+'</div>'
											+'</div>'
											);
										var hide= document.getElementById('ex-hide');
										hide.removeAttribute('hidden');
									}
								</script>
							</div>
							<input name="ex-number" type="hidden" id="ex-number" value="1" />
							<div class="text_expres" id="ex">
								<div id="ex-tag1">
									<div class="wordpress">
										<span class="list"><input name="ex_name1" type="text" placeholder="Name Company" style="width: 70%;font-size: 25px;"></span>
										<span class="nam"><input name="ex_time1" type="text" class="color" placeholder="Time" style="width: 20%;"></span><br>
										<input name="ex_position1" type="text" placeholder="Position" style="font-size: 23px;">
									</div>
									<div class="content">
										<p class="text_max"><input name="ex_achiment1"  type="text" placeholder="Achiment" style="font-size: 20px;"></p>
										<textarea name="ex_describe1"  placeholder="Describe" cols="50" style="border-bottom: 1px solid" style="font-size: 20px;"></textarea><br>
										<input name="ex_reference1"  type="text" placeholder="reference Name" style="font-size: 18px;">
										<input name="ex_rf_phone1"  type="text" placeholder="reference phone" style="margin-left: 5%;font-size: 18px;">
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
						<div class="right2">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 3-min.png">
								</div>
								<span class="contact contact01 color">SKILLS</span><br>

								<select data-placeholder="Choose a Skill..." id="select-skill"  class="chosen-select" multiple style="width:350px;" tabindex="4" onchange="chon(this)">
									<p style="color: red" id="show_message"></p>
									@foreach($skills as $skill)
									<option value="{{ $skill->id }}">{{ $skill->name }}</option>
									@endforeach

								</select>
								<input id="skill-level-num" name="skill-level-num" type="hidden" value="0">
								<div class="" id="result">

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
									+'<input type="hidden" name="skill-name'+number+'" value="'+options[i].value+'">'
									+' <input type="range" name="skill-level'+number+'" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">'
									number++;
								}
							}
							num.value=number;

							// Gán kết quả vào div#result
							document.getElementById('result').innerHTML = html;
						}
					</script>
				</div>
			</div>
			<div class="right3">
				<div class="experience">
					<div class="layer layer01 backgroundColor">
						<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
					</div>
					<span class="contact contact01 color">EDUCATION</span>
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
						x.append('<div class="col-md-6" id="edu-tag'+dem+'">'
							+'<div class="text_expres">'
							+'<div class="wordpress">'
							+'<span class="list"><input name="ed_name'+dem+'" type="text" placeholder="Name School"></span>'
							+'</div>'
							+'<div class="contant1">'
							+'<div class=" nam1"><input name="ed_time'+dem+'" class="color" type="text" placeholder="Time"></div>'
							+'<p class="text_min"><input name="ed_spe'+dem+'" type="text" placeholder="Speciality"></p>'
							+'</div>'
							+'</div>'
							+'</div>'
							);
						var hide= document.getElementById('edu-hide');
						hide.removeAttribute('hidden');
					}
				</script>
				<input name="edu-number" type="hidden" id="edu-number" value="1">
				<div class="row" id="edu">
					<div class="col-md-6" id="edu-tag1">
						<div class="text_expres">
							<div class="wordpress">
								<span class="list"><input name="ed_name1" type="text" placeholder="Name School"></span>
							</div>
							<div class="contant1">
								<div class=" nam1"><input name="ed_time1" class="color" type="text" placeholder="Time"></div>
								<p class="text_min"><input name="ed_spe1" type="text" placeholder="Speciality"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="plus-buttom" id="edu-hide" hidden style="margin-top: -1%;">
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
			<div class="right3">
				<div class="experience">
					<div class="layer layer01 backgroundColor">
						<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
					</div>
					<span class="contact contact01 color">AWARDS</span>
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
						x.append('<div class="col-md-6" id="aw-tag'+dem+'">'
							+'<div class="text_expres">'
							+'<div class="wordpress">'
							+'<span class="list"><input name="aw_name1"  type="text" placeholder="Name"></span>'
							+'</div>'
							+'<div class="contant1">'
							+'<div class=" nam1"><input name="aw_time1"  class="color" type="text" placeholder="Year"></div>'
							+'<p class="text_min"><input name="aw_describe1"  type="text" placeholder="Describe"></p>'
							+'</div>'
							+'</div>'
							+'</div>'
							);
						var hide= document.getElementById('aw-hide');
						hide.removeAttribute('hidden');
					}
				</script>
				<input name="aw-number" type="hidden" id="aw-number" value="1">
				<div class="row" id="aw">
					<div class="col-md-6" id="aw-tag1">
						<div class="text_expres">
							<div class="wordpress">
								<span class="list"><input name="aw_name1"  type="text" placeholder="Name"></span>
							</div>
							<div class="contant1">
								<div class=" nam1"><input name="aw_time1"  class="color" type="text" placeholder="Year"></div>
								<p class="text_min"><input name="aw_describe1"  type="text" placeholder="Describe"></p>
							</div>
						</div>
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
			<div class="right3">
				<div class="experience">
					<div class="layer layer01 backgroundColor">
						<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
					</div>
					<span class="contact contact01 color">HOBBIES</span>
				</div>
				<textarea name="hobbies" cols="90" rows="5"  class="ckeditor" placeholder="Yours hobbies" style="border-bottom: 1px solid;"></textarea>

			</div>

		</div>
	</div>
</div>
<div style="text-align: center;padding-bottom: 3%">
	<input type="hidden" name="imageCV" value="{{ $cv ->id}}">
	<input type="hidden" name="colorCV" value="{{ $color->id }}">
	<input style="margin: 0" type="submit" class="btn backgroundColor" value="Lưu" />
	<a href="#" class="btn backgroundColor" id="btn-print" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
</div>
</form>
<!-- Thư viện jquery đã nén phục vụ cho bootstrap.min.js  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Thư viện popper đã nén phục vụ cho bootstrap.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<!-- Bản js đã nén của bootstrap 4, đặt dưới cùng trước thẻ đóng body-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// Check Radio-box
		$('.chosen-select').chosen({width: '100%'});
		$(".rating input:radio").attr("checked", false);

		$('.rating input').click(function () {
			$(".rating span").removeClass('checked');
			$(this).parent().addClass('checked');
		});
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
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>
</body>
</html>