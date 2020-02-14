<form class="j_fi-submit" action="{{ route('final_interviews.store') }}" method="POST">
	@csrf
	<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Setup Final Interview</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Interviewer</label>
						<select name="interviewer_id" class="custom-select custom-select-sm">
							@foreach($interviewers as $interviewer)
								<option value="{{$interviewer->id}}" 
									{{ $interviewer->id == old('interviewer_id') ? 'selected' : '' }}
								>{{$interviewer->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="schedule" class="form-control form-control-sm datetime @error('schedule') is-invalid @enderror" placeholder="mm/dd/yyyy" autocomplete="off" value="{{ old('schedule') }}">

						<span class="invalid-feedback feedback-inline" role="alert">
                            @error('schedule') {{ $message }} @enderror
                        </span>
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-end justify-content-center">
					<div class="form-group">
						<button class="btn btn-primary" name="submit">Submit</button>
					</div>
				</div>
			</div>
			<h6 class="mt-3">Interviewer's Assessment</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<input type="text" name="result" class="form-control form-control-sm" disabled>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Remarks</label>
						<textarea class="form-control ckeditor ckeditor" rows="5" name="remarks" disabled></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>