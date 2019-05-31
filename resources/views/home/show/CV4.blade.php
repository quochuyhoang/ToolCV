<!DOCTYPE html>
<html>
<head>
	<title>cv thu 4</title>
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
		.color{
			color: {{ $imagecvs->colorCv }};
		}
		.backgroundColor{
			background-color: {{ $imagecvs->colorCv }};
		}
	</style>
</head>
<body>
	<div class="container template" id="pdf">
		<div class="row ">
			<div class="col-md-4 backgroundColor" id="right">

				<div class="avatar-upload">
					<div class="avatar-preview">
						@if($user_cvs->image==0)
							<div id="imagePreview" style="background-image:url({{asset('assets/img/avatar/'.Auth::user()->avatar)}});">
							</div>

						@else
							<div id="imagePreview" style="background-image:url({{asset('home_asset/cv/cvimages/'.$user_cvs->image)}});">
							</div>
						@endif

					</div>
				</div>
				<div class="name">
					<div  class="last-name">
						{{ $user_cvs->user_name }}<br>
						{{ $user_cvs->job_name }}<br>
						{{ $user_cvs->salary }}
					</div>
				</div>
				<div class="info-cv">
					<div class="info-title">
						<span>about me</span>
					</div>
					<div class="info-content">
						{{ $user_cvs->target }}
					</div>
				</div>
				<div class="info-cv">
					<div class="info-title">
						<span>contact me</span>
					</div>
					<div class="info-content">
						<div>
							{{ $user_cvs->user_address }}
						</div><br>
						<div>
							{{ $user_cvs->user_phone }}
						</div><br>
						<div>
							{{ $user_cvs->user_email }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="left">
					<div class="left-title">
						<h3 class="color">work experience</h3>
					</div>
					<div class="left-content" id="ex">
						@foreach($experience as $ex)
						<div id="ex-tag'+dem+'">
							<h4>{{ $ex->name }}</h4>
							<h5>{{ $ex->time }}</h5>
							<h6>{{ $ex->position }}</h6>
							{{ $ex->describe }}
							{{ $ex->achi }}<br/>
							<i>{{ $ex->reference }}</i>
							<span> {{ $ex->rf_phone }}</span>
						</div>
						@endforeach
					</div>
				</div>
				<div class="left">
					<div class="left-title">
						<h3 class="color">education</h3>
					</div>

					<div class="left-content" id="edu">
						@foreach($education as $ed)
								<div id="edu-tag1">
									<h4>{{ $ed->name }}</h4>
									<h5>{{ $ed->time }}</h5>
									<h6>{{ $ed->spe }}</h6>
								</div>
						@endforeach
					</div>
				</div>
				<div class="left">
					<div class="left-title">
						<h3 class="color">Awards</h3>
					</div>

					<div class="left-content" id="aw">
						@foreach($awards as $aw)
								<div id="aw-tag1">
									<h4>{{ $aw->name }}</h4>
									<h5>{{ $aw->year }}</h5>
									<h6>{{ $aw->describe }}</h6>
								</div>
						@endforeach
					</div>
				</div>
				<div class="left">
					<div class="left-title">
						<h3 class="color">persional skills</h3>
					</div>
						@foreach($user_skill as $skill)
							<h4>{{ $skill->name }}</h4>
							{{$skill->level}}%
							<input type="range"  min="1" max="100" value="{{$skill->level}}" class="slider" id="myRange" style="width: 410px;">
						@endforeach
				</div>

				<div class="left">
					<div class="left-title">
						<h3 class="color">interes/hobby</h3>
					</div>
					<div class="left-content hobby">
						{{ $user_cvs->hobbies }}
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

<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>

</html>