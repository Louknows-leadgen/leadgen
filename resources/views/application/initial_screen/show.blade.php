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
								<input class="form-control form-control-sm w-50 test_input" 
									   type="number" 
									   name="typing_score"
									   value="{{ $applicant->initial_screening->typing_score }}"
									   disabled>
							</td>
							<td>
								<input class="form-control form-control-sm w-75 test_result" 
									   type="text"
									   value="{{ $applicant->initial_screening->typing_result }}" 
									   name="typing_result" disabled>
							</td>
						</tr>
						<tr class="comprehension_test">
							<td data-toggle="tooltip"
								title="Passing score: 5/10">
								Comprehension Test
							</td>
							<td>
								<input class="form-control form-control-sm w-50 test_input" 
									   type="number" 
									   name="comprehension_score"
									   value="{{ $applicant->initial_screening->comprehension_score }}"
									   disabled>
							</td>
							<td>
								<input class="form-control form-control-sm w-75 test_result"
									   type="text" 
									   name="comprehension_result" 
									   value="{{ $applicant->initial_screening->comprehension_result }}"
									   disabled>
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
					<input type="text" class="form-control form-control-sm" value="{{$applicant->initial_screening->init_interview_result}}" disabled>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Remarks</label>
					<textarea class="form-control ckeditor" rows="5" name="init_interview_remarks" disabled>{{$applicant->initial_screening->init_interview_remarks}}</textarea>
				</div>
			</div>
		</div>
		<h6 class="mt-3">Overall Result</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->initial_screening->overall_result}}" disabled>
				</div>
			</div>
		</div>
	</div>
</div>