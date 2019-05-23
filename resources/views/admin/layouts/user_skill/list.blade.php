@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">

	<div class="table-data__tool" >
		<a class="btn btn-secondary" href="{{ route('user_skill.create') }}">Add user_skill</a>
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
					<th>User_id</th>
					<th>Skill_id</th>	
					<th>Action</th>				
				</tr>
			</thead>
			<tbody>
				@foreach( $user_skills as $n => $user_skill)
				<tr>
					<td>{{ $n }}</td>
					<td>{{ $user_skill->id }}</td>
					<td>{{ $user_skill->user_id }}</td>
					<td>{{ $user_skill->skill_id }}</td>
					<td>
						<a class="far fa-edit"  href="{{route('user_skill.edit', ['id'=>$user_skill->id])}}"></a>&nbsp;
						<a class="far fa-trash-alt" href="{{ url('backend/user_skill/Delete/'.$user_skill->id) }}" onclick="return confirmAction()"></a>
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
