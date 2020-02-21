@extends('layouts.main')

@section('contents')

	<div class="container box">
		<div class="row">
			<div class="col-md-12">
				<h5>Admin Dashboard</h5>
				<p>Welcome to Admin dashboard. Please select available actions below.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<div class="d-flex flex-column p-2">
					<img class="mx-auto mb-1 border border-primary" src="{{ asset('images/passers.svg') }}" width="100px" height="100px">
					<a class="btn btn-primary" href="{{ route('job-offerings.index') }}">Job Offer</a>
				</div>
			</div>

			<div class="col-md-2">
				<div class="d-flex flex-column p-2">
					<img class="mx-auto mb-1 border border-primary" src="{{ asset('images/employees.svg') }}" width="100px" height="100px">
					<a class="btn btn-primary" href="#">Employees</a>
				</div>
			</div>

		</div>
	</div>

@endsection