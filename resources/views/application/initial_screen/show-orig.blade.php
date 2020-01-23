@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
				<div class="exam_sec">
					<h3>Exam</h3>
					<div>
						<label>Test taken:</label>
						<input type="text" value="{{$init_screen->test->name}}" disabled>
						<label>Score:</label>
						<input type="text" value="{{$init_screen->test_score}}" disabled>
						<label>Result:</label>
						<input type="text" value="{{$init_screen->test_result}}" disabled>
					</div>
				</div>
				<div class="init_sec">
					<h3>Initial Interview</h3>
					<div>
						<label class="lbl1">Result:</label>
						<input class="select" type="text" value="{{$init_screen->init_interview_result}}" disabled>
						<label class="lbl2">Remarks:</label>
						<textarea disabled>{{$init_screen->init_interview_remarks}}</textarea>
					</div>
				</div>
				<div class="overall_sec">
					<h3>Overall Result</h3>
					<div>
						<input class="col-span-2" type="text" value="{{$init_screen->overall_result}}" disabled>
					</div>
				</div>
		</div>
	</div>
@endsection