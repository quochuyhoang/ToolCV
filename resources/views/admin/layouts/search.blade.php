@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">

{{-- 	<div class="table-responsive table--no-card m-b-30">
		<table class="table table-borderless table-striped table-earning" id="tabledata" style="text-align: center;">
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>Name</th>
					<th>Location</th>
					<th>Level</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $skills as $n => $skill)
				<tr>
					<td>{{ $n }}</td>
					<td>{{ $skill->id }}</td>
					<td>{{ $skill->name }}</td>
					<td>{{ $skill->name }}</td>
					<td>{{ $skill->level }}%</td>
					<td>
						<a class="far fa-edit"  href="{{route('skill.edit', ['id'=>$skill->id])}}"></a>&nbsp;
						<a class="far fa-trash-alt" href="{{ url('backend/skill/Delete/'.$skill->id) }}" onclick="return confirmAction()"></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> --}}
</div>
<script language="JavaScript">
	function confirmAction() {
		return confirm("Thông báo?")
	}
	
</script>

@endsection