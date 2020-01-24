<div class="row">
	<div class="col-md-12">
		<h6 class="mt-3">Exam</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Test Taken</label>
					<input type="text" class="form-control form-control-sm" value="{{$procedure->test->name}}" disabled>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Score</label>
					<input type="text" class="form-control form-control-sm" value="{{$procedure->test_score}}" disabled>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" class="form-control form-control-sm" value="{{$procedure->test_result}}" disabled>
				</div>
			</div>
		</div>
		<h6 class="mt-3">Initial Interview</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" class="form-control form-control-sm" value="{{$procedure->init_interview_result}}" disabled>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Remarks</label>
					<textarea class="form-control" rows="5" disabled>{{$procedure->init_interview_remarks}}</textarea>
				</div>
			</div>
		</div>
		<h6 class="mt-3">Overall Result</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" class="form-control form-control-sm" value="{{$procedure->overall_result}}" disabled>
				</div>
			</div>
		</div>
	</div>
</div>