@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
				<div class="setup_sec">
					<h3>Schedule Job Orientation</h3>
					<div>
						<label>Schedule:</label>
						<input type="text" value="{{$job_orient->jo_date}}" disabled>
						<button class="btn btn-confirm edit_jo" data-id="{{$job_orient->id}}">Edit</button>
					</div>
				</div>
		</div>
	</div>
@endsection