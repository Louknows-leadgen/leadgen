@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
			<form action="/final_interviews" method="POST">
				@csrf
				<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
				<div class="setup_sec">
					<h3>Setup Final Interview</h3>
					<div>
						<label>Interviewer:</label>
						<select name="interviewer_id">
							@foreach($interviewers as $interviewer)
								<option value="{{$interviewer->id}}">{{$interviewer->name}}</option>
							@endforeach
						</select>
						<label>Schedule:</label>
						<input type="text" class="datetime" name="schedule" readonly>
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
					<textarea name="remarks" disabled> </textarea>
				</div>
			</div>
			
		</div>
	</div>
@endsection