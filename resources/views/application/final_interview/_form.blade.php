<div class="row">
	<div class="col-md-12">
		<h6 class="mt-3">Setup Final Interview</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Interviewer</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->final_interview->interviewer}}" disabled>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Schedule</label>
					<input type="text" class="form-control form-control-sm" value="{{$applicant->final_interview->schedule}}" disabled>
				</div>
			</div>
			<div class="col-md-4 d-flex align-items-end justify-content-center">
				<div class="form-group">
					@if(!isset($applicant->final_interview->result))
					<button class="btn btn-primary j_edit-fin" data-id="{{$applicant->final_interview->id}}">Edit</button>
					@endif
				</div>
			</div>
		</div>
		<h6 class="mt-3">Interviewer's Assessment</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Result</label>
					<input type="text" name="result" class="form-control form-control-sm" value="{{$applicant->final_interview->result}}" disabled>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Remarks</label>
					<textarea class="form-control ckeditor" id="remarks" name="remarks" rows="5" disabled>{{$applicant->final_interview->remarks}}</textarea>
				</div>
			</div>
		</div>
	</div>
</div>