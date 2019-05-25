@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">


	<div class="table-data__tool create" >
		<a class="btn btn-secondary" href="{{ route('location.create') }}">Add Location</a>
	</div>

	<div class="table-responsive table--no-card m-b-30">
		<table class="table table-borderless table-striped table-earning" id="tabledata" style="text-align: center;">
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>Name</th>
					<th class="edit">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $locations as $n => $location)
				<tr>
					<td>{{ $n }}</td>
					<td>{{ $location->id }}</td>
					<td>{{ $location->name }}</td>
					<td class="edit">
						<a class="far fa-edit"  href="{{route('location.edit', ['id'=>$location->id])}}"></a>&nbsp;
						<a class="far fa-trash-alt" href="{{ url('backend/location/Delete/'.$location->id) }}" onclick="return confirmAction()"></a>
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