<form class="store" action="/initial_screenings" method="POST">
	@csrf
	<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Exam</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Test Taken</label>
						<select name="test_id" class="custom-select custom-select-sm">
							@foreach($tests as $test)
								<option value="{{$test->id}}" 
								{{ 
									$test->id == old('test_id') ? 'selected' : '' 
								}}>
								{{$test->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Score</label>
						<input type="text" name="test_score"  class="form-control form-control-sm @error('test_score') is-invalid @enderror" value="{{ old('test_score') }}">

                        <span class="invalid-feedback" role="alert">
                            @error('test_score') {{ $message }} @enderror
                        </span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<select name="test_result" class="custom-select custom-select-sm">
							<option value="Pass" 
							{{ 
								old('test_result') == 'Pass' ? 'selected' : '' 
							}}>
								Pass
							</option>
							<option value="Fail"
							{{ 
								old('test_result') == 'Fail' ? 'selected' : '' 
							}}>
								Fail
							</option>
						</select>
					</div>
				</div>
			</div>
			<h6 class="mt-3">Initial Interview</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<select name="init_interview_result" class="custom-select custom-select-sm">
							<option value="Pass"
							{{ 
								old('init_interview_result') == 'Pass' ? 'selected' : '' 
							}}>
								Pass
							</option>
							<option value="Fail"
							{{ 
								old('init_interview_result') == 'Fail' ? 'selected' : '' 
							}}>
								Fail
							</option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Remarks</label>
						<textarea class="form-control" rows="5" name="init_interview_remarks">{{ old('init_interview_remarks') }}</textarea>
					</div>
				</div>
			</div>
			<h6 class="mt-3">Overall Result</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<select name="overall_result" class="custom-select custom-select-sm">
							<option value="Pass"
							{{ 
								old('overall_result') == 'Pass' ? 'selected' : '' 
							}}>
								Pass
							</option>
							<option value="Fail"
							{{ 
								old('overall_result') == 'Fail' ? 'selected' : '' 
							}}>
								Fail
							</option>
						</select>
					</div>
				</div>
				<div class="col-md-8 d-flex justify-content-end align-items-end">
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>