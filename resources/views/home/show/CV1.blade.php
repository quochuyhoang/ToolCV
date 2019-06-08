<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/css/cv/style2.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('home_asset/css/plugins/chosen/chosen.css') }}" rel="stylesheet">

	<style type="text/css">
		/*.container{
			background: #fafbfb;
			color: #414142;
		}*/
		.left{
			background-image: url('{{ asset('css/cv/images/cv1/') }}/Shape.jpg');
			background-size: 300px 1000px;
			padding: 0;
		}
		.left1{
			background: rgba(246, 235, 20, 0.6);
		}
		.left2{
			color: black;
		}
		.color{
			color: {{ $imagecvs->colorCv }};
		}
		.backgroundColor{
			background-color: {{ $imagecvs->colorCv }};
		}
		.left input{
			text-align: center;
		}
		.plus-buttom{
			float: right;
		}
		.backgroundColor input,.backgroundColor textarea{
			@switch($imagecvs->colorCv)
			@case('black' && 'purple' && 'red')
			color:white;
			@break
			@endswitch
		}
	</style>
</head>

<body>

	<form>
		<div class="container template" id="pdf">
			<div class="row">
				<div class="left col-md-4 backgroundColor">
					<div class="left1 backgroundColor">
						<div class="steven">{{ $user_cvs->user_name }}</div>
						<div class="">
							<div class="avatar-upload">

								<div class="avatar-preview cricle">
									@if($user_cvs->image==0)
									<img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" width="100%" alt="Generic placeholder image">
									@else
									<img class="mr-3" src="{{ asset('home_asset/cv/cvimages/'.$user_cvs->image) }}" width="100%" alt="Generic placeholder image">
									@endif	
								</div>

					</div>

							</div>
						</div>
						<div class="graphic backgroundColor">	
							{{ $user_cvs->job_name }}<br>
							{{ $user_cvs->salary }}
							<div class="icon">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="myname">
								{{ $user_cvs->target }}
							</div>
						</div>
						<div class="left2">
							<div class="contact color">CONTACT</div>
							<div class="icon1 icon_left2">
								<div class="layer">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 2-min.png" alt="">
								</div>
								<span class="text_layer">{{ $user_cvs->user_address }}
								</span>
							</div>
							<div class="icon2 icon_left2 ">
								<div class="layer layer1">
									<img src="{{ asset('css/cv/images/cv1/') }}/phone-min.png" alt="">
								</div>
								<span class="sdt" >{{ $user_cvs->user_phone }}</span><br>

							</div>
							<div class="icon3 icon_left2 ">
								<div class="layer layer1">
									<img src="{{ asset('css/cv/images/cv1/') }}/mouse-min.png" alt="">
								</div>
								<span class="text_layer-min">
									{{ $user_cvs->user_address }}
								</span>
							</div>
						</div>

					</div>
					<div class="right col-md-8">

						<div class="right1">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 6-min.png">
								</div>
								<span class="contact contact01 color"> EXPERIENCE</span>
							</div>

							<input name="ex-number" type="hidden" id="ex-number" value="1" />
							<div class="text_expres" id="ex">
								@foreach($experience as $ex)
								<div id="ex-tag1">
									<div class="wordpress">
										<span class="list">{{ $ex->name }}</span>
										<span class="nam">{{ $ex->time }}</span><br>
										{{ $ex->position }}
									</div>
									<div class="content">
										<p class="text_max">{{ $ex->achi }}</p>
										{{ $ex->describe }}<br>
										{{ $ex->reference }}
										{{ $ex->rf_phone }}
									</div>
								</div>
								@endforeach
							</div>


						</div>
						<div class="right2">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 3-min.png">
								</div>
								<span class="contact contact01 color">SKILLS</span><br>
								@foreach($user_skill as $skill)
								<h4>{{ $skill->name }}</h4>
								{{$skill->level}}%
								<input type="range"  min="1" max="100" value="{{$skill->level}}" class="slider" id="myRange" style="width: 410px;" readonly>
								@endforeach						

							</div>
						</div>
						<div class="right3">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
								</div>
								<span class="contact contact01 color">EDUCATION</span>
							</div>

							<div class="row" id="edu">
								@foreach($education as $ed)
								<div class="col-md-6" id="edu-tag1">
									<div class="text_expres">
										<div class="wordpress">
											<span class="list">{{ $ed->name }}</span>
										</div>
										<div class="contant1">
											<div class=" nam1">{{ $ed->time }}</div>
											<p class="text_min">{{ $ed->spe }}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>
						<div class="right3">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
								</div>
								<span class="contact contact01 color">AWARDS</span>
							</div>
						
						
							
							<div class="row" id="aw">
								@foreach($awards as $aw)
								<div class="col-md-6" id="aw-tag1">
									<div class="text_expres">
										<div class="wordpress">
											<span class="list">{{ $aw->name }}</span>
										</div>
										<div class="contant1">
											<div class=" nam1">{{ $aw->year }}</div>
											<p class="text_min">{{ $aw->describe }}</p>
										</div>
									</div>
								</div>
								@endforeach	
							</div>

						</div>
						<div class="right3">
							<div class="experience">
								<div class="layer layer01 backgroundColor">
									<img src="{{ asset('css/cv/images/cv1/') }}/Layer 5-min.png">
								</div>
								<span class="contact contact01 color">HOBBIES</span>
							</div>
							{{ $user_cvs->hobbies }}

						</div>

					</div>
				</div>
			</div>
			<div style="text-align: center;"  class="hide-option">
				<a href="#" class="btn backgroundColor" id="savePDF" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
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

            $('#savePDF').click(function(){
                $('.hide-option').hide();
                $('input').css('border-bottom', 'none');
                $('textarea').css('border-bottom', 'none');
                /*document.getElementById('aaa').style.display = 'none';*/
                window.print();

            });
</script>
<script src="{{ asset('js/pdf/html2canvas.js') }}"></script>
<script src="{{ asset('js/pdf/jspdf.js') }}"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>
</body>
</html>