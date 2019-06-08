<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post" action="{{ route('search') }}">
	@csrf
	<div class="input-group">
		<input type="text" name="user_name" class="form-control" placeholder="Search for name..." aria-label="Search" aria-describedby="basic-addon2">
		<select name="userLocation" onchange="">
			<option value="">-none-</option>
			@foreach($locations as $location)
				<option value="{{ $location->id }}">{{ $location->name }}</option>
			@endforeach
		</select>
		<input type="text" name="skills" class="form-control" placeholder="Search for skill..." aria-label="Search" aria-describedby="basic-addon2" onchange="level(this)">

{{--
		<input type="text" id="skill_level" name="skill_level" class="form-control" placeholder="Search for skill level..." aria-label="Search" aria-describedby="basic-addon2">
--}}
		<div id="skill_level">
			<select name="skill_level_down" onchange="levelUp(this)">
				<option value="">-none-</option>
				@for($i=10; $i<=100; $i=$i+10)
				<option value="{{ $i }}">{{$i}}%</option>
				@endfor
			</select>
		</div>
		<div id="level_up">
			<input name="skill_level_up" type="hidden" value="" />
		</div>
		<script>
			function levelUp(obj) {

				var html='<span style="color: white">To</span><select name="skill_level_up">';

				var x=parseInt(obj.value) +10;
				for(var i=x; i<=100; i=i+10){
					html +='<option value="'+i+'">'+i+'%</option>'
				}
				html += '</select>';
				document.getElementById('level_up').innerHTML = html;
			}
		</script>
		<div class="input-group-append">
			<button class="btn btn-primary" type="submit">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</div>
	<script>
		$(document).ready( function () {
				$('#skill_level').hide();
		});

		function level(obj) {
			if(obj.value == '') {
				$('#skill_level').hide();
				$('#level_up').hide();
			}
			else{
				$('#skill_level').show();
			}
		}
	</script>
</form>