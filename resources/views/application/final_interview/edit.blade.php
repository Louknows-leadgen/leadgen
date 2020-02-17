<form class="update" 
	  action="{{ route('final_interviews.update',['final_interview'=>$procedure->id]) }}" 
	  method="POST">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="col-md-12">
			<h6 class="mt-3">Setup Final Interview</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Interviewer</label>
						<select name="interviewer_id" class="custom-select custom-select-sm">
							@foreach($interviewers as $interviewer)
								<option value="{{$interviewer->id}}" {{$interviewer->id == $procedure->interviewer_id ? 'selected' : ''}}>{{$interviewer->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="schedule" class="form-control form-control-sm datetime" placeholder="mm/dd/yyyy" autocomplete="off" value="{{$procedure->schedule}}">

						<span class="invalid-feedback feedback-inline schedule" role="alert">
						</span>
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-end justify-content-center">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<span class="btn btn-secondary j_cancel" data-type="fin-interview" data-id="{{$applicant_id}}">Cancel</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="update" value="Update">
							</div>
						</div>
					</div>
				</div>
			</div>
			<h6 class="mt-3">Interviewer's Assessment</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<input type="text" class="form-control form-control-sm" value="{{$procedure->result}}" disabled>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Remarks</label>
						<textarea class="form-control ckeditor" id="remarks" rows="5" disabled>{{$procedure->remarks}}</textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>