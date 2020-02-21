<form class="store" action="{{ route('job_orientations.store') }}" method="POST">
	@csrf
	<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Schedule Job Orientation</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="jo_date" class="form-control form-control-sm datetime @error('jo_date') is-invalid @enderror" placeholder="eg. 01/31/1900 12:00 AM" autocomplete="off" value="{{ old('jo_date') }}">

						<span class="invalid-feedback feedback-inline" role="alert">
                            @error('jo_date') {{ $message }} @enderror
                        </span>
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-end justify-content-center">
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>	