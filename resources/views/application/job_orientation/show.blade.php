<div class="row">
	<div class="col-md-12">
		<h6 class="mt-3">Schedule Job Orientation</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Schedule</label>
					<input type="text" class="form-control" value="{{$applicant->job_orientation->jo_date}}" disabled>
				</div>
			</div>
			<div class="col-md-4 d-flex align-items-end justify-content-start">
				<div class="form-group">
					<button class="btn btn-primary edit_jo" data-id="{{$applicant->job_orientation->id}}">Edit</button>
				</div>
			</div>
		</div>
	</div>
</div>
