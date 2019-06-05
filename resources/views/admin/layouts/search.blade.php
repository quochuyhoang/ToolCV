<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post" action="{{ route('search') }}">
	@csrf
	<div class="input-group">
		<input type="text" name="user_name" class="form-control" placeholder="Search for name..." aria-label="Search" aria-describedby="basic-addon2">
		<input type="text" name="skills" class="form-control" placeholder="Search for skill..." aria-label="Search" aria-describedby="basic-addon2" onchange="level(this)">
		<input type="text" id="skill_level" name="skill_level" class="form-control" placeholder="Search for skill level..." aria-label="Search" aria-describedby="basic-addon2">
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
			}
			else{
				$('#skill_level').show();
			}
		}
	</script>
</form>