@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">

	<div class="table-data__tool create" >
		<a class="btn btn-secondary " href="{{ route('admin.create') }}">Add admin</a>
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
					<th>Email</th>
					<th>Role</th>
					<th class="edit">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $admins as $n => $admin)
					<tr>
						<td>{{ $n }}</td>
						<td>{{ $admin->id }}</td>
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						<td>{{ $admin->role_id }}</td>
						<td class="edit">
							<a class="far fa-edit"  href="{{route('admin.edit', ['id'=>$admin->id])}}"></a>&nbsp;
							<a class="far fa-trash-alt" href="{{ url('backend/admin/Delete/'.$admin->id) }}" onclick="return confirmAction()"></a>
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
