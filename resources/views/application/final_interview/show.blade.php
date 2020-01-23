@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
			<div class="setup_sec">
				<h3>Setup Final Interview</h3>
				<div>
					<label>Interviewer:</label>
					<input type="text" value="{{$fin_interview->interviewer}}" disabled>
					<label>Schedule:</label>
					<input type="text" value="{{$fin_interview->schedule}}" disabled>
					
					@if(!isset($fin_interview->result))
					<button class="btn btn-confirm edit_fin-intrvw" data-id="{{$fin_interview->id}}">Edit</button>
					@endif
				</div>
			</div>
			<div class="init_sec">
				<h3>Interviewer's Assessment</h3>
				<div>
					<label class="lbl1">Result:</label>
					<input type="text" name="result" value="{{$fin_interview->result}}" disabled>
					<label class="lbl2">Remarks:</label>
					<textarea name="remarks" disabled>{{$fin_interview->remarks}}</textarea>
				</div>
			</div>
			
		</div>
	</div>
@endsection