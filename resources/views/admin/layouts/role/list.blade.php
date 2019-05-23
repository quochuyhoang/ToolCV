@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">


	<div class="table-data__tool" >
		<a class="btn btn-secondary" href="{{ route('role.create') }}">Add Role</a>
	</div>

	<div class="table-responsive table--no-card m-b-30">
		<table class="table table-borderless table-striped table-earning" id="tabledata" style="text-align: center;">
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $roles as $n => $role)
				<tr>
					<td>{{ $n }}</td>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>
						<a class="far fa-edit"  href="{{route('role.edit', ['id'=>$role->id])}}"></a>&nbsp;
						<a class="far fa-trash-alt" href="{{ url('backend/role/Delete/'.$role->id) }}" onclick="return confirmAction()"></a>
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