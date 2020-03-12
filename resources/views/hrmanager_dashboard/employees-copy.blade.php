@extends('layouts.main')

@section('contents')



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
			<h5 class="mb-4">List of active employees</h5>
			<div class="input-group mb-3">
				<input type="text" id="search-input" class="form-control" placeholder="Search">
				<div class="input-group-append">
					<button id="search-employee" class="btn btn-success" type="submit">
						<span class="fa fa-search"></span>
					</button>
				</div>
			</div>
				<div class="jo-list">
					<ul class="list-group mb-2">
						@if(count($employees))
							@foreach($employees as $employee)
								<li class="list-group-item">
								  	<div class="row">
								  		<div class="col-md-2">
								  			<img src="{{ get_avatar($employee->person->gender) }}" width="100%" height="100%">
								  		</div>
								  		<div class="col-md-10">
								  			<h5>{{ $employee->full_name }}</h5>
								  			<p><span class="fa fa-briefcase text-muted"></span> {{$employee->job_name}}</p>
								  			<a href="{{ route('employees.show',['employee'=>$employee->id]) }}" class="btn btn-primary mr-2">View Details</a>
								  			<span data-id="{{ $employee->id }}" class="btn btn-secondary remove-trigger">Blacklist</span>
								  		</div>
								  	</div>
								</li>
							@endforeach
						@else
							<li class="list-group-item text-center">No applicants as of the moment</li>
						@endif	
					</ul>
					{!! $employees->links() !!}
				</div>
		</div>
	</div>
</div>
@endsection