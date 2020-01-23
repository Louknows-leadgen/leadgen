<form action="/final_interviews/{{$fin->id}}" method="POST">
	@csrf
	@method('PUT')
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
								<option value="{{$interviewer->id}}" {{$interviewer->id == $fin->interviewer_id ? 'selected' : ''}}>{{$interviewer->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Schedule</label>
						<input type="text" name="schedule" class="form-control form-control-sm datetime" placeholder="mm/dd/yyyy" autocomplete="off" value="{{$fin->schedule}}">
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-end justify-content-center">
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</div>
			<h6 class="mt-3">Interviewer's Assessment</h6>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Result</label>
						<input type="text" class="form-control form-control-sm" value="{{$fin_interview->result}}" disabled>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Remarks</label>
						<textarea class="form-control" rows="5" disabled>{{$fin_interview->remarks}}</textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>