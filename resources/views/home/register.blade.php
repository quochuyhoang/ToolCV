<style>
  .input-group {
    width: 100%;
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
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
									{{ $err }}<br>
								@endforeach
							</div>
						@endif

						@if(session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
						@endif

						<div class="input-group form-group">
                <label>Name:</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
						</div>
						<div class="input-group form-group">
              <label>Birthday:</label>
							<input type="date" id="birth" name="birth" class="form-control" placeholder="(dd/MM/yyyy)" value="{{ old('birth') }}">
						</div>
						<div class="input-group form-group">
              <label>Phone Number:</label>
							<input type="text" id="phone" name="phone" class="form-control" maxlength="12" placeholder="phone" value="{{ old('phone') }}">
						</div>
						<div class="input-group form-group">
              <label>Address:</label>
							<input type="text" id="address" name="address" class="form-control" placeholder="address" value="{{ old('address') }}">
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
												document.getElementById('imagePreview').innerHTML = '<img style="width:100px;" src="' + e.target.result + '"/>';
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
							<input type="password" id="password" name="password" class="form-control" placeholder="password" onchange="lengthPasswword()" >

						</div>
						<p id="lengthpass" style="color: red; font-size: 15px"></p>
						<script>
							function lengthPasswword() {
								var x = document.getElementById('password').value;

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
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="confirmPassword" onchange="confirmPasswword()">
						</div>
						<p id="errorpass" style="color: red; font-size: 15px"></p>
						<script>
							function confirmPasswword() {
								var x = document.getElementById('password').value;
								var y = document.getElementById('confirmPassword').value;


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
