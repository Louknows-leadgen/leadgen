<form class="update" 
	  action="{{ route('job_orientations.update',['job_orientation'=>$procedure->id]) }}" method="POST">
	@csrf
	@method('PUT')
	<input type="hidden" name="scheduler" value="{{ Auth::id() }}">
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Schedule Job Orientation</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="jo_date" class="form-control datetime" placeholder="eg. 01/31/1900 12:00 AM" autocomplete="off" value="{{$procedure->jo_date}}">
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