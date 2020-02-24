<form class="store" action="{{ route('initial_screenings.store') }}" method="POST">
	@csrf
	<input type="hidden" name="init_interviewer" value="{{ Auth::id() }}">
	<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Exam</h6>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-fixed table-sm test-table">
						<thead>
							<tr>
								<th>Test taken</th>
								<th class="th-sm">Score</th>
								<th>Result</th>
							</tr>
						</thead>
						<tbody>
							<tr class="typing_test">
								<td data-toggle="tooltip"
									title="Passing score: 28wpm">
									Typing Speed (wpm)
								</td>
								<td>
									<input class="form-control form-control-sm w-50 test_input @error('typing_score') is-invalid @enderror" 
											   type="number" 
											   name="typing_score"
											   value="{{ old('typing_score') }}">
									
									@error('typing_score')
										<span class="invalid-feedback" 
											  role="alert">
				                            	{{ $message }} 
				                        </span>
			                        @enderror	   
								</td>
								<td>
									<input class="form-control form-control-sm w-75 test_result" 
										   type="text" 
										   name="typing_result"
										   value="{{ old('typing_result') }}"
										   readonly>
								</td>
							</tr>
							<tr class="comprehension_test">
								<td data-toggle="tooltip"
									title="Passing score: 5/10">
									Comprehension Test
								</td>
								<td>
									<input class="form-control form-control-sm w-50 test_input @error('comprehension_score') is-invalid @enderror" 
										   type="number" 
										   name="comprehension_score"
										   value="{{ old('comprehension_score') }}">

									@error('comprehension_score')
										<span class="invalid-feedback" 
											  role="alert"> 
				                            	{{ $message }}
				                        </span>
			                        @enderror   
								</td>
								<td>
									<input class="form-control form-control-sm w-75 test_result"
										   type="text" 
										   name="comprehension_result" 
										   value="{{ old('comprehension_result') }}"
										   readonly>
								</td>
							</tr>
						</tbody>
					</table>
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
						<textarea class="form-control ckeditor" rows="5" name="init_interview_remarks">{{ old('init_interview_remarks') }}</textarea>
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