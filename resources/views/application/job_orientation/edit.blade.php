<form action="/job_orientations/{{$jo->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="setup_sec">
		<h3>Schedule Job Orientation</h3>
		<div>
			<label>Schedule:</label>
			<input type="text" class="date" name="jo_date" value="{{$jo->jo_date}}" readonly>
			<input class="btn btn-confirm" type="submit" name="submit" value="Submit">
		</div>
	</div>
</form>	