@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong>Edit Location</strong>
		</div>
		<div class="table-data__tool" >
			<a class="btn btn-secondary" href="{{ route('location') }}">Back</a>
		</div>
		<div class="card-body card-block">
			<form action="{{ url('backend/location/Edit/'.$locations->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						<input type="name" id="name" name="name" placeholder="Name" value="{{$locations->name}}"  class="form-control">
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