@extends('layouts.main')

@section('contents')

	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<h5 class="text-primary"> {{ $applicant->full_name }} </h5>
			</div>
		</div>
	</div>

@endsection