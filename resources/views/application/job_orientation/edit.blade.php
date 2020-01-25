<form class="update" action="/job_orientations/{{$procedure->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Schedule Job Orientation</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="jo_date" class="form-control date" placeholder="mm/dd/yyyy" autocomplete="off" value="{{$procedure->jo_date}}">
						<span class="invalid-feedback feedback-inline jo_date" role="alert">
						</span>	
					</div>
				</div>
				<div class="col-md-2 p-0 d-flex align-items-end justify-content-center">
					<div class="form-group">
						<span class="btn btn-secondary j_cancel" data-type="jo" data-id="{{$applicant_id}}">Cancel</span>
					</div>
				</div>
				<div class="col-md-2 p-0 d-flex align-items-end justify-content-start">
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="Update">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>	