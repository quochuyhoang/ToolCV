@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong>Edit Admin</strong>
		</div>
		<div class="table-data__tool" >
			<a class="btn btn-secondary" href="{{ route('admin') }}">Back</a>
		</div>
		<div class="card-body card-block">
			<form action="{{ url('backend/admin/Edit/'.$admins->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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

				<div class="row form-group">
					<div class="col col-md-3">
						<label for="name" class=" form-control-label">Name</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="name" id="name" name="name" placeholder="Name" value="{{$admins->name}}" class="form-control">
					</div>
				</div>				
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="email" class=" form-control-label">Email</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="email" id="email" name="email" placeholder="Email" value="{{$admins->email}}" class="form-control">
					</div>
				</div>	
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="address" class=" form-control-label">Role</label>
					</div>
					<div class="col-12 col-md-9">
						<select  class="form-control" name="role_id" id="role_id" value="{{$admins->role_id}}">

							@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
							@endforeach
						</select>
					</div>
				</div>	
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="password" class=" form-control-label">Password</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="password" id="password" name="password" placeholder="Password" value="{{$admins->password}}" class="form-control">
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-sm">
					<i class="fa fa-dot-circle-o"></i> Submit
				</button>

			</form>
		</div>

	</div>
</div>

@endsection