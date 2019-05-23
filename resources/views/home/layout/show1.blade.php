


<!DOCTYPE html>
<html>
<head>
	<title>cv thu 2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="{{ asset('') }}home_asset/cv/cv2/css/cv2.css">
	<link rel="stylesheet"  href="{{ asset('') }}home_asset/cv/cv2/css/cv3.css">
</head>
<body>
	@foreach($input as $in)
		{{ $in }}

	@endforeach
		
	<div class="container">
		<div class="template">
				<div class="header" style="background-image: url({{ asset('') }}home_asset/cv/cv2/images/background-cv3.png);">
					<div class="avatar">
						<div class="cricle">
							<img src="{{ asset('') }}home_asset/cv/cv2/images/avatar-1.jpg" alt="">
						</div>
					</div>
					
					<div class="name">
						<span>{{ Auth::user()->name }}	
						</span>
						<div class="resume">
							
							<span>resume</span>
							
						</div>
					</div>
					<div class="job-name">
						<span>CREATIVE DISGNER</span>
						<span><?php echo $_POST['apply_position']; ?></span>

					</div>
					<div class="job-demo">
						{{  $input['target'] }}
					</div>

					
						
				</div>
				<div class="template-body">
					<div class="row contact">
						<div class="col-md-4 item-contact">
							
								<i class="fas fa-phone"></i>
							
							
							<div class="contact-title">
								<span>phone</span>
							</div>
						</div>

						<div class="col-md-4 item-contact">
							<i class="fas fa-globe-americas"></i>
							<div class="contact-title">
								<span>free@psdfreebies.com</span><br>
								<span>www.psdfreebies.com</span>
							</div>
						</div>

						<div class="col-md-4 item-contact">
							<i class="fas fa-map-marker-alt"></i>
							<div class="contact-title">
								<span>123, Main Street, Your City</span><br>
								<span>New York, USA 456789</span>
							</div>
						</div>
					</div>

					<div class="row">
		<div class="col-md-7">
			<div class="test">
				<h2 class="exp">EXPERIENCE</h2>


				<div class="last-job">
						<div class="job-left">
							
							
							<h4 class="time">{{  $input['ex_time1'] }}</h4>
							<h5 class="name">{{  $input['ex_name1'] }}</h5>
							<h4 class="job-location">{{  $input['ex_position1'] }}</h4>
						</div>
						<div class="job-right">
							
							<div class="job-describer">
							{{  $input['ex_describe1'] }}
							</div>
						</div>	
						<div style="clear: both;"></div>
						
				</div>



				
				<div style="clear: both;"></div>
			</div>

			<div class="test">
				<h2 class="exp">education</h2>
				<div class="last-job">
						<div class="job-left">
							
							
							<h4 class="time">{{  $input['ed_time1'] }}</h4>
							<h5 class="name">{{  $input['ed_name1'] }}</h5>
						</div>
						<div class="job-right">
							
							<div class="job-describer">
							{{  $input['ed_spe1'] }}
							</div>
						</div>
						<div style="clear: both;"></div>
						
				</div>

			</div>
			

		</div>
		<div class="col-md-5"> 
			<div class="test" style="margin-bottom: 50px" >
				
				<h2 class="exp">PRO SKILLS</h2>
				<h4>DESIGN</h4>
				<div class="progress">
				  <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<h4>CSS</h4>
				<div class="progress">
				  <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
				</div>	
				<h4>JAVASCRIP</h4>
				<div class="progress">
				  <div class="progress-bar bg-dark" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
				</div>

				<h4>HTML</h4>
				<div class="progress">
				  <div class="progress-bar bg-dark" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
				</div>

				<h4>WORDPRESS</h4>
				<div class="progress">
				  <div class="progress-bar bg-dark" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
				</div>

				<div style="clear: both;"></div>
			</div>
			<div class="test">
				<h2 class="exp">references</h2>
				<div class="last-job">
						<div class="job-header">
							<h4>{{  $input['aw_name1'] }}</h4>
						</div>
						<div class="job-body">

							<h5 style="float: left;margin-right: 20px">job position</h5>
							<h5>Name company</h5>
							<h5>location</h5>
							<div class="job-describer">
							{{  $input['aw_describe1'] }}
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

