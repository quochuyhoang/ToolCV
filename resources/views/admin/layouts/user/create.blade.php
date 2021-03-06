@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong>Create User</strong>
		</div>
		<div class="table-data__tool" >
			<a class="btn btn-secondary" href="{{ route('user') }}">Back</a>
		</div>
		<div class="card-body card-block">
			<form action="{{ route('user.postcreate') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
				{!! csrf_field() !!}
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{ $err }}<br>
					@endforeach
				</div>
				@endif

				@if(session('thongbao'))
				<div class = "alert alert-success">{{ session('thongbao') }}</div>
				@endif

				<div class="row form-group">
					<div class="col col-md-3">
						<label for="name" class=" form-control-label">Name</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="name" id="name" name="name" placeholder="Name" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="birth" class=" form-control-label">Birthday</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="date" id="birth" name="birth" class="date form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="phone" class=" form-control-label">Phone</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="tell" id="phone" name="phone" placeholder="Phone" maxlength="12" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="address" class=" form-control-label">Address</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" id="address" name="address" placeholder="Address" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="avatar" class=" form-control-label">Avatar </label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="avatar" name="avatar" placeholder="Avatar" class="form-control" onchange="fileValidation()">
						<div id="imagePreview">
							
						</div>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="email" class=" form-control-label">Email</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="email" id="email" name="email" placeholder="Email" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="location_id" class=" form-control-label">Location</label>
					</div>
					<div class="col-12 col-md-9">
						<select name="location_id" class="form-control">
							@foreach($locations as $location)
							<option value="{{ $location->id}}">{{$location->name }}</option>
							@endforeach
						</select>
					</div>
				</div>		
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="password" class=" form-control-label">Password</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control">
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-sm">
					<i class="fa fa-dot-circle-o"></i> Submit
				</button>

			</form>
		</div>

	</div>
</div>
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
		document.getElementById('imagePreview').innerHTML = '<img style="width:25%;" src="'+e.target.result+'"/>';
	};
	reader.readAsDataURL(fileInput.files[0]);
}
}
}
</script>    
@endsection