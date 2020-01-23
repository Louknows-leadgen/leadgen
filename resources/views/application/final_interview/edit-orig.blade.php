<form action="/final_interviews/{{$fin->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="setup_sec">
		<h3>Setup Final Interview</h3>
		<div>
			<label>Interviewer:</label>
			<select name="interviewer_id">
				@foreach($interviewers as $interviewer)
					<option value="{{$interviewer->id}}" {{$interviewer->id == $fin->interviewer_id ? 'selected' : ''}}>{{$interviewer->name}}</option>
				@endforeach
			</select>
			<label>Schedule:</label>
			<input type="text" class="datetime" name="schedule" value="{{$fin->schedule}}" readonly>
			<input class="btn btn-confirm" type="submit" name="submit" value="Submit">
		</div>
	</div>
</form>	
<div class="init_sec">
	<h3>Interviewer's Assessment</h3>
	<div>
		<label class="lbl1">Result:</label>
		<input type="text" name="result" value=" " disabled>
		<label class="lbl2">Remarks:</label>
		<textarea name="remarks" disabled></textarea>
	</div>
</div>