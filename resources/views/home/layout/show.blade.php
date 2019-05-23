 @extends('home.index')
 @section('content1')
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="{{ asset('') }}home_asset/cv/cv1/style.css">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 </head>
 <body>
 	<div class="row">
 		<div class="col-lg-10 offset-lg-1">
 			<!-- header -->
 			<div class="header">
 				<div class="row bgHeader">
 					<div class="col-lg-3" style="background-color: white;">
 						<div class="image"></div>
 					</div>
 					<div class="col-lg-9" style="">
 						<div class="name">
 							<span class="name">
 								{{ Auth::user()->name }}
 							</span>
 						</div>
 						<span class="job_name">creative designer</span>
 						<p class="job_describe">
 							@foreach( $user_cvs as  $user_cvs)
 							{{ $user_cvs->target }}
 							@endforeach
 						</p>
 					</div>
 				</div>
 			</div>
 			<!-- education -->
 			<div class="education">
 				<div class="row bgCV">
 					<div class="col-lg-7">
 						<div class="software_skill">
 							<img src="{{ asset('') }}home_asset/cv/img/ps.png" alt="">
 							<div class="skill_level">
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index"></div>
 							</div>
 						</div>
 						<div class="software_skill">
 							<img src="{{ asset('') }}home_asset/cv/img/ai.png" alt="">
 							<div class="skill_level">
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index"></div>
 							</div>
 						</div>
 						<div class="software_skill">
 							<img src="{{ asset('') }}home_asset/cv/img/f.png" alt="">
 							<div class="skill_level">
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index"></div>
 							</div>
 						</div>
 						<div class="software_skill">
 							<img src="{{ asset('') }}home_asset/cv/img/html5.png" alt="">
 							<div class="skill_level">
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index current"></div>
 								<div class="index"></div>
 							</div>
 						</div>
 					</div>
 					
 					<div class="col-lg-5" style="padding-bottom: 50px; background-color: #f5f4f4;">

 						<div class="skill_ability">
 							@foreach( $skills as  $skill)
 							<span>{{ $skill->name }}</span>
 							<div class="progress">
 								
 								<div id="user_skill" class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">										
 									
 									{{ $skill->level }}
 									
 								</div>
 							</div>
 							@endforeach
 						</div>
 					</div>
 					
 				</div>
 			</div>
 			<!-- exprience -->
 			<div class="experience">
 				<div class="row bgCV">
 					<div class="col-lg-2">
 						<div class="topic">
 							<p style="left: 90px; top: 270px;">Experience</p>
 						</div>
 					</div>
 					@foreach( $experience as  $experience)
 					<div class="col-lg-5">
 						<div class="test">

 							<div class="last-job">
 								<div class="job-header">
 									<div class="circle"></div>
 								</div>
{{-- 								<h5>{{ $experience->$name }}</h5>
								<h6>{{ $experience->$position }}</h6>
								<div class="job-describe">
									{{ $experience->$describe }}
								</div> --}}
							</div>

						</div>
					</div>
					@endforeach

				</div>
				<div class="row bgCV split"></div>
			</div>
			<!-- education -->
			<div class="experience">
				<div class="row bgCV">
					@foreach( $education as  $education)					
					<div class="col-lg-5">
						<div class="test">
							<div class="last-job">
								<div class="job-header">
									<div class="circle"></div>
								</div>
{{-- 								<h5>{{ $education->$name }}</h5>
								<h6>{{ $education->$spe }}</h6>
								<div class="job-describe">
									{{	{{ $education->$spe }} --}}
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<div class="col-lg-2">
						<div class="topic">
							<p>Education</p>
						</div>
					</div>
				</div>
				<div class="row bgCV split"></div>
			</div>
			<!-- hobbies / contact -->
			<div class="hobb_and_cont">
				<div class="row bgCV">
					<div class="col-lg-6 hobbies" style="border-radius: 5px;">
						<div class="row">
							<div class="col-lg-2">
								<div class="topic">
									<p style="top: 165px; left: 45px;">hobbies</p>
								</div>
							</div>
							<div class="col-lg-10 hobbies_content">
								<div class="row">
									<div class="col-lg-4 pb-5">
										<i class="fas fa-plane fa-3x icon_hobbies"></i>
										<h6>travel</h6>
									</div>
									<div class="col-lg-4">
										<i class="fas fa-bicycle fa-3x icon_hobbies"></i>
										<h6>cycling</h6>
									</div>
									<div class="col-lg-4">
										<i class="fas fa-snowboarding fa-3x icon_hobbies"></i>
										<h6>Kayak</h6>
									</div>
									<div class="col-lg-4">
										<i class="fas fa-video fa-3x icon_hobbies"></i>
										<h6>movies</h6>
									</div>
									<div class="col-lg-4">
										<i class="fas fa-headphones-alt fa-3x icon_hobbies"></i>
										<h6>music</h6>
									</div>
									<div class="col-lg-4">
										<i class="fas fa-dumbbell fa-3x icon_hobbies"></i>
										<h6>gym</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 contact">
						<div class="row">
							<div class="col-lg-2">
								<div class="topic">
									<p style="top: 165px; left: 45px;">contact</p>
								</div>
							</div>
							<div class="col-lg-10">
								<div class="row contact_info">
									<div class="col-lg-1 offset-lg-1">
										<i class="fas fa-phone fa-2x text-center"></i>
									</div>
									<div class="col-lg-1"></div>	
									<div class="col-lg-6">
										<span>+12 3456 7890</span><br>
										<span>+12 3456 7890</span>
									</div>
								</div>

								<div class="row contact_info">
									<div class="col-lg-1 offset-lg-1">
										<i class="fas fa-globe-americas fa-2x text-center"></i>
									</div>
									<div class="col-lg-1"></div>
									<div class="col-lg-6">
										<span>free@psdfreebies.com</span><br>
										<span>www.psdfreebies.com</span>
									</div>
								</div>
								<div class="row contact_info">
									<div class="col-lg-1 offset-lg-1">
										<i class="fas fa-map-marker-alt fa-2x text-center"></i>
									</div>
									<div class="col-lg-1"></div>
									<div class="col-lg-6">
										<span>123, Main Street, Your City</span><br>
										<span>New York, USA 456789</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row bgCV split"></div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
@endsection