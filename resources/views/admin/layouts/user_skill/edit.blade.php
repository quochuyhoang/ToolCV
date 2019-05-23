@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong>Edit Admin</strong>
		</div>
		<div class="table-data__tool" >
			<a class="btn btn-secondary" href="{{ route('user_skill') }}">Back</a>
		</div>
		<div class="card-body card-block">
			<form action="{{ url('backend/user_skill/Edit/'.$user_skills->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						<label for="address" class=" form-control-label">User_id</label>
					</div>
					<div class="col-12 col-md-9">
						<select  class="form-control" name="user_id" id="user_id" value="{{$user_skills->user_id}}">
							@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>
					</div>
				</div>	
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="address" class=" form-control-label">Skill_id</label>
					</div>
					<div class="col-12 col-md-9">
						<select  class="form-control" name="skill_id" id="skill_id" value="{{$user_skills->skill_id}}">
							@foreach($skills as $skill)
							<option value="{{$skill->id}}">{{$skill->name}}</option>
							@endforeach
						</select>
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