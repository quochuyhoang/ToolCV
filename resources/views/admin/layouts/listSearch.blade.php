@extends('admin.dashboard') 
@section('content')
<div class="col-lg-12">

	@if(isset($name)&&isset($skill)&&isset($level))
		<h4>Có {{ $count }} kết quả với từ khóa: tên: {{ $name }} có skill {{ $skill }} level {{ $level }}%</h4>
	@elseif(isset($name)&&isset($skill))
		<h4>Có {{ $count }} kết quả với từ khóa: tên: {{ $name }} có skill {{ $skill }}</h4>
	@elseif(isset($skill)&&isset($level))
		<h4>Có {{ $count }} kết quả với từ khóa: skill: {{ $skill }} level {{ $level }}%</h4>
	@elseif(isset($name))
		<h4>Có {{ $count }} kết quả với từ khóa: tên: {{ $name }}</h4>
	@elseif(isset($skill))
		<h4>Có {{ $count }} kết quả với từ khóa: skill: {{ $skill }}</h4>
	@endif
	@if(session('success'))
	<div class = "alert alert-success">{{ session('success') }}</div>
	@endif

	<div class="table-responsive">
		<table class="table table-striped" id="tabledata">
			<thead>
				<tr>
					<th></th>
					<th>Avartar</th>
					<th>Name</th>
					<th>Birth</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Skills</th>
					<th>CV</th>
				</tr>
			</thead>
			<tbody>
			@foreach($items as $key => $item)
				<tr>
					<td>{{ $key+1 }}</td>
					<td><img src="{{asset('assets/img/avatar/'.$item->avatar)}}" width="100px"></td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->birth }}</td>
					<td>{{ $item->phone }}</td>
					<td>{{ $item->email }}</td>
					<td>{{ $item->address }}</td>
					<td>
						<ul>
							@foreach($user_skills as $user_skill)
								@if($user_skill->user_id == $item->id)
									<li>{{ $user_skill->name }} - {{ $user_skill->level }}%</li>
								@endif
							@endforeach

						</ul>
					</td>
					<td><a href="">view CV</a></td>

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
