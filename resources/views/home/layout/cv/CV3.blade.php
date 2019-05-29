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
			color: {{ $color->name }};
		}
		.backgroundColor{
			background-color: {{ $color->name }};
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
					<div class="media" id="imagePreview">
					  <img class="mr-3" src="{{ asset('assets/img/avatar/'.Auth::user()->avatar) }}" width="100%" alt="Generic placeholder image">
					</div>

                    <ul>
						<li class="userInfor">
							<i class="fa fa-map-marker color" aria-hidden="true"></i>
							<input name="address" placeholder="Your Address" value="{{ Auth::user()->address }}">
						</li>
						<li class="userInfor">
							<i class="fa fa-mobile color" aria-hidden="true"></i>
							<input name="phone" placeholder="Your Phone Number" value="{{ Auth::user()->phone }}">
						</li>
						<li class="userInfor">
							<i class="fa fa-envelope color" aria-hidden="true"></i>
							<input name="email" placeholder="Your Address" value="{{ Auth::user()->email }}">
						</li>
                        <li class="userInfor">
                            <i class="fas fa-money color" aria-hidden="true"></i>
                            <input name="salary" type="number" placeholder="Salary">
                        </li>

					</ul>
									
				</div>
				<div class="col-md-6 ">

					<div class="media-body ">
						<h2 class="mt-0"><i class="fas fa-quote-left color"></i>about us</h2>
						<textarea name="target" cols="60" rows="5"  class="ckeditor" placeholder="About You"></textarea>
					</div>
				</div>
                <input type="file" id="file" name="newImage" onchange="fileValidation()"/>
                <script>
                    function fileValidation(){
                        var fileInput = document.getElementById('file');
                        var filePath = fileInput.value;//lấy giá trị input theo id
                        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
//Kiểm tra định dạng
                        if(!allowedExtensions.exec(filePath)){
                            alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                            fileInput.value = '';
                            return false;
                        }else{
//Image preview
                            if (fileInput.files && fileInput.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('imagePreview').innerHTML = '<img style="width:200px;" src="'+e.target.result+'"/>';
                                };
                                reader.readAsDataURL(fileInput.files[0]);
                            }
                        }
                    }
                </script>
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
										+'<input name="ex_time'+dem+'" class="color" type="text" placeholder="Time">'
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
										+'<div class="job-describer">'
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
				</div>
				<h2 class="exp">EXPERIENCE</h2>
				<div class="last-job" id="ex">
					<input name="ex-number" type="hidden" id="ex-number" value="1" />
						<div id="ex-tag1">
							<div class="job-header">

								<h3 class="name">
									<input name="ex_name1" type="text" placeholder="Name Company">
								</h3>
								<h4 class="time ">
									<input name="ex_time1" type="text" class="color" placeholder="Time">
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
							<div class="job-describer">
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
									+'<h4 class="time">	<input name="aw_time'+dem+'" class="color" type="text" placeholder="Year"></h4>'
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
							<h4 class="time">	<input name="aw_time1"  class="color" type="text" placeholder="Year"></h4>
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
						<i class="fa fa-heart" aria-hidden="true"></i>
					</div>
				</div>

				<h2 class="exp">Hobbies</h2>
                <textarea name="hobbies" cols="60" rows="5"  class="ckeditor" placeholder="Yours hobbies"></textarea>

				<script>
					function hob() {
						var x= document.getElementById('hobbies').value;
						alert(x);
					}
				</script>

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
								+'<h4 class="time"><input name="ed_time'+dem+' class="color" type="text" placeholder="Time"></h4>'
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
								<h4 class="time"><input name="ed_time1" class="color" type="text" placeholder="Time"></h4>
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
                <select data-placeholder="Choose a Skill..." id="select-skill"  class="chosen-select" multiple style="width:350px;" tabindex="4" onchange="chon(this)">
                    <p style="color: red" id="show_message"></p>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach

                </select>
                <input id="skill-level-num" name="skill-level-num" type="text" alue="0">
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
                                        +'<input type="hidden" name="skill-name'+number+'" value="'+options[i].value+'">'
                                    +' <select id="skill-level" name="skill-level'+number+'" onchange="an(this)">' +
                                    '<option value="10" >10%</option>' +
                                    '<option value="20" >20%</option>' +
                                    '<option value="30" >30%</option>' +
                                    '<option value="40" >40%</option>' +
                                    '<option value="50" >50%</option>' +
                                    '<option value="60" >60%</option>' +
                                    '<option value="70" >70%</option>' +
                                    '<option value="80" >80%</option>' +
                                    '<option value="90" >90%</option>' +
                                    '<option value="100" >100%</option>' +
                                    '</select><br>'
                                /* +'<div class="progress">'
                                    +'<div class="progress-bar backgroundColor" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>'
                                    +'</div><br>'*/
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
		</div>
		</div>
	<div style="text-align: center;">
        <input type="hidden" name="imageCV" value="{{ $cv ->id}}">
        <input type="hidden" name="colorCV" value="{{ $color->id }}">
		<input type="submit" class="btn backgroundColor" value="Lưu" />
		<a href="#" class="btn backgroundColor" id="btn-print" onclick=""><i class="fa fa-download"></i> Xuất PDF</a>
	</div>
	<script>
		$(document).ready(function(){

			$('.tagsinput').tagsinput({
				tagClass: 'label label-danger'
			});
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
</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('home_asset/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{ asset('home_asset/js/plugins/chosen/chosen.jquery.js')}}"></script>
</body>
	
</html>