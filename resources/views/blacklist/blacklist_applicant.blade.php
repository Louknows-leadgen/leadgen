@extends('layouts.main')

@section('contents')

	<div class="container">
		<div class="row">
			<div class="box col-md-7 mx-auto">
				<h5>Blacklist Applicant</h5>
				<form action="{{ route('blacklists.applicant_store') }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Full name </label>
								<input type="text" class="form-control form-control-sm" value="{{ $applicant->full_name }}" readonly>
								<input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Applied for </label>
								<input type="text" class="form-control form-control-sm" value="{{ $applicant->job_name }}" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label> Reason for blacklisting </label>
								<textarea class="form-control ckeditor is-invalid" name="reason" id="ckeditor"></textarea>

								@error('reason')
									<span class="invalid-feedback">
										{{ $message }}
									</span>
								@enderror

							</div>
						</div>
						<div class="col-md-12">
							<input type="submit" name="submit" class="btn btn-primary float-right" value="Submit">
							<a href="{{ route('job-offerings.index') }}" class="btn btn-secondary float-right mr-3">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection