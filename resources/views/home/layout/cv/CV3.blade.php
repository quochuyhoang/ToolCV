<!DOCTYPE html>
<html>
<head>
	<title>cv thu 2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="{{ asset('css/cv') }}/cv2.css">
	<style type="text/css">
		.color{
			color: {{ $color->name }};
		}
		.backgroundColor{
			background-color: {{ $color->name }};
		}
	</style>
</head>
<body>
<form name="create" method="post" action="#">
	<div class="container template">
		<div class="header" >
			<div class="row row-1">
				<div class="col-md-6 name">
					<div class="name">
						<input name="name"  type="text" placeholder="Your Name" value="{{ Auth::user()->name }}">
					</div>
					<span class="job-name backgroundColor">
						<input name="job-name" id="jobName" placeholder="Wanted job">
					</span>
				</div>
				<div class="col-md-6 contact-header">

				</div>
			</div>
			<div class="row">
				<div class="col-md-6 info">
					<div class="media">
					  <img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" alt="Generic placeholder image">

					</div>
					<ul>
						<li class="userInfor">
							<i class="fa fa-map-marker color" aria-hidden="true"></i>
							<input name="email" placeholder="Your Address" value="{{ Auth::user()->address }}">
						</li>
						<li class="userInfor">
							<i class="fa fa-mobile color" aria-hidden="true"></i>
							<input name="email" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}">
						</li>
						<li class="userInfor">
							<i class="fa fa-envelope color" aria-hidden="true"></i>
							<input name="email" placeholder="Your Address" value="{{ Auth::user()->email }}">
						</li>

					</ul>
									
				</div>
				<div class="col-md-6 ">

					<div class="media-body ">
						<h2 class="mt-0"><i class="fas fa-quote-left color"></i>about us</h2>
						<textarea name="" cols="60" rows="5"  class="ckeditor" placeholder="About You"></textarea>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
		<div class="col-md-7">
			<div class="test">
				<div class="title ">
					<div class="cricle backgroundColor">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>

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
										+'<div class="job-header">'
										+'<h3 class="name">'
										+'<input name="ex_name'+dem+'" type="text" placeholder="Name Company">'
										+'</h3>'
										+'<h4 class="time">'
										+'<input name="ex_time'+dem+'" type="text" placeholder="Time">'
										+'</h4>'
										+'</div>'
										+'<div class="job-body">'
										+'<h4 class="job-location">'
										+'<input name="ex_position'+dem+'" type="text" placeholder="Position">'
										+'</h4>'
										+'</div>'
										+'<div class="job-describer">'
										+'<textarea name="ex_describe'+dem+'"  placeholder="Describe" cols="50"></textarea>'
										+'<input name="ex_achiment'+dem+'"  type="text" placeholder="Achiment">'
										+'</div>'
										+'</div>'
								);
								var hide= document.getElementById('ex-hide');
								hide.removeAttribute('hidden');
							}
						</script>
					</div>
				</div>
				<h2 class="exp">EXPERIENCE</h2>
				<div class="last-job" id="ex">
					<input name="ex-number" type="hidden" id="ex-number" value="1" />
						<div id="ex-tag1">
							<div class="job-header">

								<h3 class="name">
									<input name="ex_name1" type="text" placeholder="Name Company">
								</h3>
								<h4 class="time">
									<input name="ex_time1" type="text" placeholder="Time">
								</h4>
							</div>
							<div class="job-body">
								<h4 class="job-location">
									<input name="ex_position1" type="text" placeholder="Position">
								</h4>
							</div>
							<div class="job-describer">
								<textarea name="ex_describe1"  placeholder="Describe" cols="50"></textarea>
								<!--<input name="ex_describe1"  type="text" placeholder="Describe">-->
								<input name="ex_achiment1"  type="text" placeholder="Achiment">
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


			<div class="test">
				<div class="title">
					<div class="cricle backgroundColor">
						<i class="fa fa-gift" aria-hidden="true"></i>
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
							x.append('<div id="aw-tag'+dem+'">'
									+'<hr>'
									+'<div class="job-header">'
									+'<h3 class="name">'
									+'<input name="aw_name'+dem+'"  type="text" placeholder="Name">'
									+'</h3>'
									+'<h4 class="time">	<input name="aw_time'+dem+'"  type="text" placeholder="Year"></h4>'
									+'</div>'
									+'<div class="job-describer">'
									+'<input name="aw_describe'+dem+'"  type="text" placeholder="Describe">'
									+'</div>'
									+'</div>'
							);
							var hide= document.getElementById('aw-hide');
							hide.removeAttribute('hidden');
						}
					</script>
				</div>
				<h2 class="exp">Awards</h2>
				<input name="aw-number" type="hidden" id="aw-number" value="1">
				<div class="last-job" id="aw">
					<div id="aw-tag1">
						<div class="job-header">

							<h3 class="name">
								<input name="aw_name1"  type="text" placeholder="Name">
							</h3>
							<h4 class="time">	<input name="aw_time1"  type="text" placeholder="Year"></h4>
						</div>
						<div class="job-describer">
							<input name="aw_describe1"  type="text" placeholder="Describe">
						</div>
					</div>
				</div>

				<div class="plus-buttom" id="aw-hide" hidden>
					<a  onclick="hideAW()" title="More Experience">
						<i class="fa fa-times"></i>
					</a>
					<script>
						function hideAW() {
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

			<div class="test" style="margin-top: 30px">
				<div class="title">
					<div class="cricle backgroundColor">
						<i class="fa fa-heart" aria-hidden="true"></i>/i>
					</div>
				</div>
				<h2 class="exp">OTHER SKILLS</h2>
						<div class="hobby">
							<ul>
								<li class="hobby-1">
									<div class="hobby-title">
										<span>TRAVEL</span>
									</div>
								</li>
							</ul>

						</div>
			</div>

		</div>
		<div class="col-md-5">
			<div class="test">
				<div class="title">
					<div class="cricle backgroundColor">
						<i class="fa fa-graduation-cap" aria-hidden="true"></i>
					</div>
				</div>
				<h2 class="exp">EDUCATION</h2>
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
								+'<div class="job-header">'
								+'<h3 class="name">'
								+'<input name="ed_name'+dem+'" type="text" placeholder="Desired Salary">'
								+'</h3>'
								+'<h4 class="time"><input name="ed_time'+dem+' type="text" placeholder="Time"></h4>'
								+'</div>'
								+'<div class="job-describer">'
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
							<div class="job-header">

								<h3 class="name">
									<input name="ed_name1" type="text" placeholder="Desired Salary">
								</h3>
								<h4 class="time"><input name="ed_time1" type="text" placeholder="Time"></h4>
							</div>

							<div class="job-describer">
								<input name="ed_spe1" type="text" placeholder="Speciality">
							</div>
					</div>

				</div>
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
				
			<div class="test" class="test" style="margin-top: 30px">
				<div class="title">
					<div class="cricle backgroundColor">
						<i class="fa fa-bolt" aria-hidden="true"></i>
					</div>
				</div>
				<h2 class="exp">PRO SKILLS</h2>

				<h4>CSS</h4>
				<div class="progress">
				  <div class="progress-bar backgroundColor" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
				</div>

			</div>
		</div>
		</div>
		</div>
</form>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
			
</body>
	
</html>