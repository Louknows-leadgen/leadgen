@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')
	@include('application/applicant_info')
	<div class="card wp-mid margin-auto margin-top-30 margin-bot-30">
		@include('application/application-nav')
		<div class="process_body">
			<form action="/job_orientations" method="POST">
				@csrf
				<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
				<div class="setup_sec">
					<h3>Schedule Job Orientation</h3>
					<div>
						<label>Schedule:</label>
						<input type="text" class="date" name="jo_date" readonly>
						<input class="btn btn-confirm" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</form>	
		</div>
	</div>
@endsection