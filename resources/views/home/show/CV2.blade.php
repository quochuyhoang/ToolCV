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
			background-color: {{ $imagecvs->colorCv }};
			opacity: 0.25;
		}

		.color{
			color: {{ $imagecvs->colorCv }};
		}
		.backgroundColor{
			z-index: 1;
			background-color: {{ $imagecvs->colorCv }};
			opacity: 0.75;
		}
		.backgroundColor input,.backgroundColor textarea {
			text-align: center;
		}
	</style>
</head>

<body>

		<div class="container" id="pdf">
			<div class="template">

				<div class="header backgroundColor" style="">
					<div class="avatar">
						<div class="cricle">
							@if($user_cvs->image==0)
								<img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" width="100%" alt="Generic placeholder image">
							@else
								<img class="mr-3" src="{{ asset('home_asset/cv/cvimages/'.$user_cvs->image) }}" width="100%" alt="Generic placeholder image">
							@endif						
						</div>
					</div>

					<div class="name">
						{{ $user_cvs->user_name }}
						<div class="resume">
							{{ $user_cvs->job_name }}<br>
						</div>
					</div>
					<div class="job-name">
						{{ $user_cvs->salary }}
					</div>
					<div class="job-demo">
						{{ $user_cvs->target }}
					</div>

				</div>

				<div class="template-body">
					<div class="row contact">
						<div class="col-md-4 item-contact">

							<i class="fas fa-phone color"></i>


							<div class="contact-title">
								{{ $user_cvs->user_phone }}
							</div>
						</div>

						<div class="col-md-4 item-contact">
							<i class="fas fa-globe-americas color"></i>
							<div class="contact-title">
								{{ $user_cvs->user_address }}
							</div>
						</div>

						<div class="col-md-4 item-contact">
							<i class="fas fa-envelope color"></i>
							<div class="contact-title">
								{{ $user_cvs->user_email }}

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-7">
							<div class="test">
								<h2 class="exp color">EXPERIENCE</h2>


								<div class="last-job" id="ex">
									@foreach($experience as $ex)
									<div id="ex-tag1">
										<div class="exp-title">
											{{ $ex->time }}
										</div>
										<div class="exp-content">
											{{ $ex->name }}
											{{ $ex->position }}

										</div>

										<div class="content">
											{{ $ex->describe }}<br>
											<!--<input name="ex_describe1"  type="text" placeholder="Describe">-->
											{{ $ex->achi }}<br>
											{{ $ex->reference }}
											{{ $ex->rf_phone }}
										</div>
									</div>
									@endforeach
								</div>
							</div>

							<div class="test">
								<h2 class="exp color">educations</h2>

								<div class="last-job" id="edu">
									@foreach($education as $ed)
									<div id="edu-tag1">
										<div class="exp-title">
											{{ $ed->name }}
										</div>
										<div class="exp-content">
											{{ $ed->time }}
										</div>
										<div class="location">
											{{ $ed->spe }}
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="test">
								<h2 class="exp color">awards</h2>
								<div class="last-job" id="aw">
									@foreach($awards as $aw)

									<div id="aw-tag1">
										<div class="exp-title">
											{{ $aw->year }}
										</div>
										<div class="exp-content">
											{{ $aw->name }}
										</div>
										<div class="content">
											{{ $aw->describe }}
										</div>

									</div>								
									@endforeach	
								</div>
								<div style="clear: both;"></div>
							</div>


						</div>
						<div class="col-md-5">
							<div class="test" style="margin-bottom: 50px" >
								<h2 class="exp color">PRO SKILLS</h2>
								@foreach($user_skill as $skill)
									<h4>{{ $skill->name }}</h4>
									{{$skill->level}}%
									<input type="range"  min="1" max="100" value="{{$skill->level}}" class="slider" id="myRange" style="width: 410px;" readonly>
								@endforeach
							</div>
							<div class="test">
								<h2 class="exp color">hobbies</h2>
								{{ $user_cvs->hobbies }}
							</div>
						</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>
</html>