@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
			<form action="/initial_screenings" method="POST">
				@csrf
				<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
				<div class="exam_sec">
					<h3>Exam</h3>
					<div>
						<label>Test taken:</label>
						<select name="test_id">
							@foreach($tests as $test)
								<option value="{{$test->id}}">{{$test->name}}</option>
							@endforeach
						</select>
						<label>Score:</label>
						<input type="text" name="test_score">
						<label>Result:</label>
						<select name="test_result">
							<option value="Pass">Pass</option>
							<option value="Fail">Fail</option>
						</select>
					</div>
				</div>
				<div class="init_sec">
					<h3>Initial Interview</h3>
					<div>
						<label class="lbl1">Result:</label>
						<select class="select" name="init_interview_result">
							<option value="Pass">Pass</option>
							<option value="Fail">Fail</option>
						</select>
						<label class="lbl2">Remarks:</label>
						<textarea name="init_interview_remarks"></textarea>
					</div>
				</div>
				<div class="overall_sec">
					<h3>Overall Result</h3>
					<div>
						<select class="col-span-2" name="overall_result">
							<option value="Pass">Pass</option>
							<option value="Fail">Fail</option>
						</select>
						<input class="btn btn-confirm" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection