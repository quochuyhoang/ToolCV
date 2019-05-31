<!DOCTYPE html>
<html>
<head>
	<title>cv thu 2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv22.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css') }}/bootstrap-tagsinput/bootstrap-tagsinput.css" />
	<link href="{{ asset('home_asset/css/plugins/chosen/chosen.css') }}" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<style type="text/css">
		.color{
			color: {{ $imagecvs->colorCv }};
		}
		.backgroundColor{
			background-color: {{ $imagecvs->colorCv }};
		}
		.slider {
			-webkit-appearance: none;
			width: 100%;
			height: 15px;
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
			background: black;
			cursor: pointer;
		}

		.slider::-moz-range-thumb {
			width: 15px;
			height: 15px;
			border-radius: 50%;
			background: #4CAF50;
			cursor: pointer;
		}
	</style>
</head>
<body>

	<div class="container template" id="pdf">
		<div class="header" >
			<div class="row row-1">
				<div class="col-md-6 name">
					<div class="name">
						{{ $user_cvs->user_name }}
					</div>
					<span class="job-name backgroundColor">
						{{ $user_cvs->job_name }}<br>
					</span>
				</div>
				<div class="col-md-6 contact-header">

				</div>
			</div>
			<div class="row">
				<div class="col-md-6 info">
					<div class="media" id="imagePreview">
						@if($user_cvs->image==0)
							<img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" width="100%" alt="Generic placeholder image">
						@else
						<img class="mr-3" src="{{ asset('home_asset/cv/cvimages/'.$user_cvs->image) }}" width="100%" alt="Generic placeholder image">
						@endif
					</div>

					<ul>
						<li class="userInfor">
							<i class="fa fa-map-marker color" aria-hidden="true"></i>
							{{ $user_cvs->user_address }}
						</li>
						<li class="userInfor">
							<i class="fa fa-mobile color" aria-hidden="true"></i>
							{{ $user_cvs->user_phone }}
						</li>
						<li class="userInfor">
							<i class="fa fa-envelope color" aria-hidden="true"></i>
							{{ $user_cvs->user_email }}
						</li>
						<li class="userInfor">
							<i class="fas fa-money color" aria-hidden="true"></i>
							{{ $user_cvs->salary }}
						</li>

					</ul>

				</div>
				<div class="col-md-6 ">

					<div class="media-body ">
						<h2 class="mt-0"><i class="fas fa-quote-left color"></i>about us</h2>
						{{ $user_cvs->target }}
					</div>
				</div>

			</div>

		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="test">
					<div class="title ">
						<div class="cricle backgroundColor">
							<i class="fas fa-shopping-bag"></i>
						</div>
					</div>
					<h2 class="exp">EXPERIENCE</h2>
					<div class="last-job" id="ex">
						@foreach($experience as $ex)

						<div id="ex-tag1">
							<div class="job-header">
								<h3 class="name">
									{{ $ex->name }}
								</h3>
								<h4 class="time ">
									{{ $ex->time }}
								</h4>
							</div>
							<div class="job-body">
								<h4 class="job-location">
									{{ $ex->position }}
								</h4>
							</div>
							<div class="job-describer">
								{{ $ex->describe }}
								{{ $ex->achi }}
							</div>
							<div class="job-describer">
								{{ $ex->reference }}
								{{ $ex->rf_phone }}
							</div>
						</div>
						@endforeach

					</div>
				</div>


				<div class="test">
					<div class="title">
						<div class="cricle backgroundColor">
							<i class="fa fa-gift" aria-hidden="true"></i>
						</div>
					</div>
					<h2 class="exp">Awards</h2>
					<div class="last-job" id="aw">
						@foreach($awards as $aw)
						<div id="aw-tag1">
							<div class="job-header">
								<h3 class="name">
									{{ $aw->name }}
								</h3>
								<h4 class="time">{{ $aw->year }}</h4>
							</div>
							<div class="job-describer">
								{{ $aw->describe }}
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="test" style="margin-top: 30px">
					<div class="title">
						<div class="cricle backgroundColor">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</div>
					</div>

					<h2 class="exp">Hobbies</h2>
					{{ $user_cvs->hobbies }}

				</div>

			</div>
			<div class="col-md-5">
				<div class="test">
					<div class="title">
						<div class="cricle backgroundColor">
							<i class="fa fa-graduation-cap" aria-hidden="true" style="padding-left:5%;"></i>
						</div>
					</div>
					<h2 class="exp">EDUCATION</h2>
					<div class="last-job" id="edu">
						<input name="edu-number" type="hidden" id="edu-number" value="1">
						<div id="edu-tag1">
							@foreach($education as $ed)
							<div class="job-header">
								<h3 class="name">
									{{ $ed->name }}
								</h3>
								<h4 class="time">{{ $ed->time }}</h4>
							</div>

							<div class="job-describer">
								{{ $ed->spe }}
							</div>
							@endforeach
						</div>

					</div>
				</div>

				<div class="test" class="test" style="margin-top: 30px">
					<div class="title">
						<div class="cricle backgroundColor">
							<i class="fa fa-bolt" aria-hidden="true" style="padding-left:24%"></i>
						</div>
					</div>
					<h2 class="exp">PRO SKILLS</h2>
					@foreach($user_skill as $skill)
						<h4>{{ $skill->name }}</h4>
						{{$skill->level}}%
							<input type="range"  min="1" max="100" value="{{$skill->level}}" class="slider" id="myRange" style="width: 410px;">
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div style="text-align: center;">
	<a href="#" class="btn backgroundColor" id="btn-print" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
	</div>

</body>
<script type="javascript">
	$(document).ready(function(){
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{ asset('home_asset/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
	<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>


</html>