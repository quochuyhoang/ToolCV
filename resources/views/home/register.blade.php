<style>
  .input-group {
    width: 100%;
  }

    .birth-day .birth-item{
        float: left;
        width: 30%;
    }
  .birth-day .birth-item select{
      width: 50%;
      background-color: white;
  }
</style>
<div class="container">

	<div class="modal fade" id="registerModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ route('home.register.post') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<!-- Modal Header -->
					<div class="modal-header">
              <h4 class="modal-title text-center" style="text-shadow: 1px 1px 3px;font-size: 30px;">Create Account</h4>
              <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size:40px;">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						@if(count($errors)>0)

								<?php  $error =""; ?>
								@foreach($errors->all() as $err)
									<?php $error .= $err."<br>"; ?>
								@endforeach
								{!! $error !!}
							<script>
								alert({!! $error !!}+"hihi");
							</script>
						@endif

						<div class="input-group form-group">
                <label>Name:</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
						</div>
						<div class="input-group form-group">
              <label>Birthday:</label>
{{--
							<input type="date" id="birth" name="birth" class="form-control" placeholder="(dd/MM/yyyy)" value="{{ old('birth') }}" max="{{ date('d/m/Y') }}" onchange="checkday(this)">
--}}                     <div class="input-group birth-day">
                                <div id="" class="birth-item">
                                Year:<select id="year" name="year" onchange="changyear(this)">
                                    <?php $now = getdate();?>
                                    @for($i = $now["year"]- 15 ; $i>= $now["year"]- 45 ; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                </div>
                                <div id="" class="birth-item">
                                Month:<select id="month" name="month" onchange="checkmonth(this)">
                                    @for($i = 1; $i<=12 ; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                </div>
                                <div id="monthday" class="birth-item">
                                Day:<select id="day" name="day">
                                    @for($i = 1; $i<=31 ; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                                </div>
                            </div>
                            <script>
                                function checkmonth(obj) {
                                    var day= document.getElementById('monthday');
                                    var year= document.getElementById('year');
                                    var numberday="Day:<select id='day' name='day'>";
                                    switch ( parseInt(obj.value)) {
                                        case 2:{
                                            if(year.value%4==0 && year.value%100!=0 || year.value%400==0) {
                                                for (i = 1; i <= 29; i++) {
                                                    numberday += "<option value='" + i + "'>" + i + "</option>";
                                                }
                                            }
                                            else {
                                                for (i = 1; i <= 28; i++) {
                                                    numberday += "<option value='" + i + "'>" + i + "</option>";
                                                }
                                            }
                                        break;
                                        }
                                        case 4:
                                        case 6:
                                        case 9:
                                        case 11:
                                            {
                                            for(i=1; i<=30; i++){
                                                numberday += "<option value='"+i+"'>"+i+"</option>";
                                            }
                                            break;
                                        }
                                        default:{
                                            for(i=1; i<=31; i++){
                                                numberday += "<option value='"+i+"'>"+i+"</option>";
                                            }
                                            break;
                                        }

                                    }
                                    numberday +="</select>";
                                    day.innerHTML =numberday;
                                }
                                function changyear(obj) {
                                    var day = document.getElementById('monthday');
                                    var month = document.getElementById('month');
                                    if (parseInt(month.value) == 2) {
                                        var numberday = "Day:<select id='day' name='day'>";
                                        if (obj.value % 4 == 0 && obj.value % 100 != 0 || obj.value % 400 == 0) {
                                            for (i = 1; i <= 29; i++) {
                                                numberday += "<option value='" + i + "'>" + i + "</option>";
                                            }
                                        }
                                        else{
                                            for (i = 1; i <= 28; i++) {
                                                numberday += "<option value='" + i + "'>" + i + "</option>";
                                            }
                                        }

                                        numberday += "</select>";
                                        day.innerHTML = numberday;
                                    }
                                }
                            </script>
						</div>
						<div class="input-group form-group">
              <label>Avatar:</label>
							<input type="file" id="avatar" name="avatar" style="border: transparent;" placeholder="Avatar" class="form-control" onchange="fileValidation()" accept=".jpg, .png, .gif">
							<script type="text/javascript">
								function fileValidation() {
									var fileInput = document.getElementById('avatar');
									var filePath = fileInput.value; //lấy giá trị input theo id
									var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
									//Kiểm tra định dạng
									if (!allowedExtensions.exec(filePath)) {
										alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
										fileInput.value = '';
										return false;
									} else {
										//Image preview
										if (fileInput.files && fileInput.files[0]) {
											var reader = new FileReader();
											reader.onload = function (e) {
												document.getElementById('imagePreview').innerHTML = '<img style="width:300px;" src="' + e.target.result + '"/>';
											};
											reader.readAsDataURL(fileInput.files[0]);
										}
									}
								}
							</script>
						</div>
						<div id="imagePreview" style="margin: 0 auto;">
						</div>
						<div class="input-group form-group">
              <label>Email:</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
						</div>
						<div class="input-group form-group">
              <label>City:</label>
							<select name="location_id" class="form-control">
								@foreach($locations as $location)
									<option value="{{ $location->id}}">{{$location->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group form-group">
              <label>Password:</label>
							<input type="password" id="inputpassword" name="password" class="form-control" placeholder="password" onchange="lengthPasswword(this)" >

						</div>
						<p id="lengthpass" style="color: red; font-size: 15px"></p>
						<script>
							function lengthPasswword(obj) {
								var x = obj.value;
								if (x.length < 8) {
									document.getElementById('lengthpass').style.display = 'block';
									document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
								} else {
									document.getElementById('lengthpass').style.display = 'none';
								}
							}
						</script>
						<div class="input-group form-group">
              <label>Re-Password:</label>
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="confirmPassword" onchange="confirmPasswword(this)">
						</div>
						<p id="errorpass" style="color: red; font-size: 15px"></p>
						<script>
							function confirmPasswword(obj) {
								var y = document.getElementById('inputpassword').value;
								var x = obj.value;
								if (x != y) {
									document.getElementById('errorpass').style.display = 'block';
									document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
								} else {
									document.getElementById('errorpass').style.display = 'none';
								}
							}
						</script>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="submit" value="Register" class="btn btn-block btn-warning float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>

</div>