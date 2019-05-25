

<!DOCTYPE html>
<html>

<head>
	<title>Register Page</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
	integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{ asset("") }}/home_asset/css_form/styles.css">
</head>
<style>
	body {
		background-color: #8EC5FC; 
		background-image: url('https://images.wallpaperscraft.com/image/night_city_aerial_view_buildings_140989_1366x768.jpg');
	}
	span {
		width: 42px;
	}

</style>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100 mt-3">
			<div class="card">
				<div class="card-header">
					<h3>Register</h3>
					<div class="d-flex justify-content-end social_icon"></div>
				</div>
				<div class="card-body">
					<form action="{{ route('user.postcreate1') }}" method="POST">
						{!! csrf_field() !!}
						@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{ $err }}<br>
							@endforeach
						</div>
						@endif

						@if(session('success'))
						<div class = "alert alert-success">{{ session('success') }}</div>
						@endif

						<div class="input-group form-group">                           
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="name" name="name" class="form-control" placeholder="name">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
							</div>
							<input type="date" id="birth" name="birth" class="form-control" placeholder="Birthday (dd/MM/yyyy)">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="text" id="phone" name="phone" class="form-control" maxlength="12" placeholder="phone">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
							</div>
							<input type="text" id="address" name="address" class="form-control" placeholder="address">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="file" id="avatar" name="avatar" placeholder="Avatar" class="form-control" onchange="fileValidation()">

						</div>
						<div id="imagePreview" style="margin: 0 auto;">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-at"></i></span>
							</div>
							<input type="email" id="email" name="email" class="form-control" placeholder="email">
						</div>
						<div class="input-group form-group">

							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-city"></i></span>
							</div>
							<select name="location_id" class="form-control">
								@foreach($locations as $location)
								<option value="{{ $location->id}}">{{$location->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control" placeholder="password" onchange="lengthPasswword()">

						</div>
						<p id="lengthpass" style="color: red; font-size: 15px"></p>
						<script>
							function lengthPasswword() {
								var x= document.getElementById('password').value;



								if(x.length < 8){
									document.getElementById('lengthpass').style.display = 'block';
									document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
								}
								else
								{
									document.getElementById('lengthpass').style.display = 'none';

								}
							}
						</script>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="confirmPassword" onchange="confirmPasswword()">
						</div>
						<p id="errorpass" style="color: red; font-size: 15px"></p>
						<script>
								function confirmPasswword() {
									var x= document.getElementById('password').value;
									var y= document.getElementById('confirmPassword').value;


									if(x != y){
										document.getElementById('errorpass').style.display = 'block';
										document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
										}
									else
										{
										document.getElementById('errorpass').style.display = 'none';

										}
								}
						</script>
						<div class="card-footer">
							<div class="form-group">
								<input type="submit" value="Back" class="btn float-left login_btn">
								<input type="submit" value="Register" class="btn float-right login_btn">
							</div>
						</div>

					</form>
				</div>
				
			</div>
		</div>
	</div>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
		function fileValidation(){
			var fileInput = document.getElementById('avatar');
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
		document.getElementById('imagePreview').innerHTML = '<img style="width:100px;" src="'+e.target.result+'"/>';
	};
	reader.readAsDataURL(fileInput.files[0]);
}
}
}
</script>  

</body>

</html>