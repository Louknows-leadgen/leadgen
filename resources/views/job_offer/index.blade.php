@extends('layouts.main')

@section('contents')

<!-- Prompt for confirmation area -->

<div class="bg-notif">
    <div class="card w-25">
        <div class="card-header font-weight-bold">No Show</div>
        <div class="card-body">
            Tag this applicant as no show?
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <button class="btn btn-primary" data-page="job-offering">Yes</button>
        </div>
    </div>
</div>

<div class="decline-confirm-bg">
    <div class="card w-25">
        <div class="card-header font-weight-bold">Declined Offer</div>
        <div class="card-body">
            Proceed with this action?
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <button class="btn btn-primary">Yes</button>
        </div>
    </div>
</div>


<div class="blacklist-confirm-bg">
    <div class="card w-25">
        <div class="card-header font-weight-bold">Blacklist Applicant</div>
        <div class="card-body">
            Proceed with this action?
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <button class="btn btn-primary">Yes</button>
        </div>
    </div>
</div>

<!-- Prompt for confirmation area -->

<div class="container box mb-5">

	@if(Session('success'))
        <div class="notif-process-top alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! </strong>{{ Session('success') }}
        </div>
    @endif

    <div class="back">
        <div>
            <a class="text-primary" href="{{ route('hr-managers.index') }}">Back to dashboard</a>
        </div>
    </div>

	<div class="row">
		<div class="mx-auto col-md-6">
			<h5 class="mb-4">List of applicants for job offering</h5>
			<div class="input-group mb-3">
				<input type="text" id="search-input" class="form-control" placeholder="Search">
				<div class="input-group-append">
					<button id="search-offer" class="btn btn-success" type="submit">
						<span class="fa fa-search"></span>
					</button>
				</div>
			</div>
				<div class="jo-list">
					<ul class="list-group mb-2">
						@if(count($applicants))
							@foreach($applicants as $applicant)
								<li class="list-group-item">
								  	<div class="row">
								  		<div class="col-md-2">
								  			<img src="{{ $applicant->avatar }}" width="100%" height="100%">
								  		</div>
								  		<div class="col-md-10">
								  			<h5>{{ $applicant->person->name() }}</h5>
								  			<p><span class="fa fa-briefcase text-muted"></span> {{$applicant->job_name}}</p>
								  			<a href="{{ route('employees.create',['applicant_id'=>$applicant->id]) }}" class="btn btn-primary mr-2 mb-2">Hire</a>
								  			<span data-id="{{ $applicant->id }}" class="btn btn-secondary remove-trigger mr-2 mb-2">No show</span>
								  			<span data-id="{{ $applicant->id }}" class="btn btn-danger decline-offer-trig mr-2 mb-2">Declined Offer</span>
								  			<span data-id="{{ $applicant->id }}" data-type="applicant" class="btn btn-dark blacklist-trig mr-2 mb-2">Blacklist</span>
								  		</div>
								  	</div>
								</li>
							@endforeach
						@else
							<li class="list-group-item text-center">No applicants as of the moment</li>
						@endif	
					</ul>
					{!! $applicants->links() !!}
				</div>
		</div>
	</div>
</div>
@endsection