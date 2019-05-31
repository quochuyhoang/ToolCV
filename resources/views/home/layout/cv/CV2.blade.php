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
	<style type="text/css">
		input,textarea {
			border: none;
			background-color: transparent;
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
		.backgroundColor input,.backgroundColor textarea{
			@switch($color->name)
                @case('black' && 'purple')
					color:white;
			@break
			@endswitch
	</style>
</head>

<body>
<div class="container">
	<div class="template">

			<div class="header backgroundColor" style="">
			<div class="avatar">
				<div class="cricle">

				</div>
			</div>

			<div class="name">
				<input type="text" placeholder="Your name" class="text-center" style="text-transform: uppercase;">
				<div class="resume">
					<input type="text" placeholder="REsume" class="text-center" style="text-transform: uppercase; color: white">
				</div>
			</div>
			<div class="job-name">

				<input type="text" placeholder="CREATIVE DISGNER" class="text-center" style="text-transform: uppercase; letter-spacing: 15px;width: 100%;">
			</div>
			<div class="job-demo">
				<textarea name="" placeholder="Content" rows="5" style="width: 100%;"></textarea>
			</div>

		</div>

		<div class="template-body">
			<div class="row contact">
				<div class="col-md-4 item-contact">

					<i class="fas fa-phone color"></i>


					<div class="contact-title">
						<span>+12 3456 7890</span><br>
						<span>+12 3456 7890</span>
					</div>
				</div>

				<div class="col-md-4 item-contact">
					<i class="fas fa-globe-americas color"></i>
					<div class="contact-title">
						<span>free@psdfreebies.com</span><br>
						<span>www.psdfreebies.com</span>
					</div>
				</div>

				<div class="col-md-4 item-contact">
					<i class="fas fa-map-marker-alt color"></i>
					<div class="contact-title">
						<span>123, Main Street, Your City</span><br>
						<span>New York, USA 456789</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-7">
					<div class="test">
						<h2 class="exp color">EXPERIENCE</h2>
						<div class="last-job">
							<div class="exp-title">
								<input type="text" placeholder="Year" style="text-align: center;width: 15%;"><span>to</span><input type="text" placeholder="Year" style="text-align: center;width: 15%;"><br>
							</div>
							<div class="exp-content">
								<input type="text" placeholder="PROJECT MANAGER">
							</div>

							<div class="content">
								<textarea name="" rows="4" placeholder="Content" style="width: 100%;"></textarea>
							</div>
						</div>
						<div class="last-job">
							<div class="exp-title">
								<input type="text" placeholder="Year" style="text-align: center;width: 15%;"><span class="color"



								>to</span><input type="text" placeholder="Year" style="text-align: center;width: 15%;"><br>
							</div>
							<div class="exp-content">
								<input type="text" placeholder="PROJECT MANAGER">
							</div>

							<div class="content">
								<textarea name="" rows="4" placeholder="Content" style="width: 100%;"></textarea>
							</div>
						</div>
					</div>

					<div class="test">
						<h2 class="exp color">education</h2>
						<div class="last-job">
							<div class="job-left">
								<div class="exp-title">
									<input type="text" placeholder="Year" style="text-align: center;width: 35%;"><span class="color">to</span><input type="text" placeholder="Year" style="text-align: center;width: 35%;"><br>
								</div>
								<div class="exp-content">
									<input type="text" placeholder="PROJECT MANAGER">
								</div>
								<div class="location">
									<input type="text" placeholder="Lorem tecnology" style="text-align: center;">
								</div>
							</div>
							<div class="job-right">
								<div class="content">
									<textarea name="" rows="4" placeholder="Content" style="width: 100%;"></textarea>
								</div>
							</div>
							<div style="clear: both;"></div>
						</div>
						<div class="last-job">
							<div class="job-left">
								<div class="exp-title">
									<input type="text" placeholder="Year" style="text-align: center;width: 35%;"><span>to</span><input type="text" placeholder="Year" style="text-align: center;width: 35%;"><br>
								</div>
								<div class="exp-content">
									<input type="text" placeholder="PROJECT MANAGER">
								</div>
								<div class="location">
									<input type="text" placeholder="Lorem tecnology" style="text-align: center;">
								</div>
							</div>
							<div class="job-right">
								<div class="content">
									<textarea name="" rows="4" placeholder="Content" style="width: 100%;"></textarea>
								</div>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>


				</div>
				<div class="col-md-5">
					<div class="test" style="margin-bottom: 50px" >

						<h2 class="exp color">PRO SKILLS</h2>
						<h4>DESIGN</h4>
						<div class="progress">
							<input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">
						</div>
						<h4>CSS</h4>
						<div class="progress">
							<input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">
						</div>
						<h4>JAVASCRIP</h4>
						<div class="progress ">
							<input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">
						</div>

						<h4>HTML</h4>
						<div class="progress">
							<input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">
						</div>

						<h4>WORDPRESS</h4>
						<div class="progress">
							<input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 410px;">
						</div>

						<div style="clear: both;"></div>
					</div>
					<div class="test">
						<h2 class="exp color">references</h2>
						<div class="last-job">
							<div class="job-header">
								<input type="text" placeholder="REFERENCE NAME" style="text-transform: uppercase;font-weight: bold;font-size: 25px;">
							</div>
							<div class="job-body" style="padding-left: 10px;">
								<h5 style="float: left;margin-right: 20px"><input type="text" placeholder="Job Position" style="text-transform: uppercase;font-size: 20px;"></h5>
								<input type="text" placeholder="Name Company" style="text-transform: uppercase;font-size: 20px;">
								<h5>location</h5>
								<div class="job-describer">
									<textarea name="" placeholder="Content" rows="3" style="width: 100%"></textarea>
								</div>
							</div>
						</div>
						<div class="last-job">
							<div class="job-header">
								<input type="text" placeholder="REFERENCE NAME" style="text-transform: uppercase;font-weight: bold;font-size: 25px;">
							</div>
							<div class="job-body" style="padding-left: 10px;">
								<h5 style="float: left;margin-right: 20px"><input type="text" placeholder="Job Position" style="text-transform: uppercase;font-size: 20px;"></h5>
								<input type="text" placeholder="Name Company" style="text-transform: uppercase;font-size: 20px;">
								<h5>location</h5>
								<div class="job-describer">
									<textarea name="" placeholder="Content" rows="3" style="width: 100%"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>