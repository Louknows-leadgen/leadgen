@extends('layouts.main')

@section('title', 'Resources > Applicant')

@section('contents')
	<div class="box container w-50">
		
		@if ($errors->any())
		    <div class="alert alert-danger alert-dismissible">
		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
		    	<p>The ff. errors prevented the operation to continue:</p>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		        <p>Go back to <a href="{{ route('person.form') }}">form</a>.</p>
		    </div>
		@endif

		<div class="row">
			<div class="col-md-12 mx-auto">
				<form action="/applicants" method="post">
					@csrf
					<input type="hidden" name="person_id" value="{{$person_id}}">
					<div class="form-group col-md-12">
						<label>Apply For:</label>
						<select name="job_id" class="custom-select">
							@foreach($jobs as $job)
								<option value="{{$job->id}}">{{$job->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Site Applied:</label>
						<select name="applied_site" class="custom-select">
							@foreach($sites as $site)
								<option value="{{$site->id}}">{{$site->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Referror:</label>
						<input type="text" name="referror" class="form-control">
					</div>

					<div class="form-group col-md-12 d-flex justify-content-end">
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection