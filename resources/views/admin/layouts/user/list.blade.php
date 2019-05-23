@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">

	<div class="table-data__tool" >
		<a class="btn btn-secondary" href="{{ route('user.create') }}">Add user</a>
	</div>
	@if(session('success'))
				<div class = "alert alert-success">{{ session('success') }}</div>
				@endif

	<div class="table-responsive table--no-card m-b-30">
		<table class="table table-borderless table-striped table-earning" id="tabledata" style="text-align: center;">
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>Name</th>
					<th>Birthday</th>
					<th>Avatar</th>					
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $users as $n => $user)
					<tr>
						<td>{{ $n }}</td>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ date('d-m-Y',strtotime($user->birth)) }}</td>
						<td>{{ $user->avatar }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->phone }}</td>
						<td>{{ $user->address }}</td>
						<td>{{ $user->location_id }}</td>
						<td>
							<a class="far fa-edit"  href="{{route('user.edit', ['id'=>$user->id])}}"></a>&nbsp;
							<a class="far fa-trash-alt" href="{{ url('backend/user/Delete/'.$user->id) }}" onclick="return confirmAction()"></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script language="JavaScript">
      function confirmAction() {
        return confirm("Thông báo?")
      }
 
</script>

@endsection
