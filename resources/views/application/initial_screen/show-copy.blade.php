<div class="row">
	<div class="col-md-12">
		<h6 class="mt-3">Exam</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Test Taken</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->initial_screening->test_name}}" disabled>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Score</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->initial_screening->test_score}}" disabled>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->initial_screening->test_result}}" disabled>
				</div>
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