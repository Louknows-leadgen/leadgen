@extends('layouts.main')

@section('contents')

	<div class="row">
		<div class="mx-auto col-md-6">

			<div class="sign-in">
		        <div>
		            <a class="text-primary" href="{{ URL::previous() }}">Back</a>
		        </div>
		    </div>
			
			<h5 class="mb-4">Notifications</h5>
				<ul class="list-group mb-2">
					@if(count($notifications))
						@foreach($notifications as $notification)
							<li class="list-group-item">
							  	<div class="row">
							  		<div class="col-md-2">
								  			<img src="{{ $notification->applicant->avatar }}" width="100%" height="100%">
								  		</div>
							  		<div class="col-md-10">
							  			<h5>{{ $notification->full_name }}</h5>
							  			<p><span class="fa fa-briefcase text-muted"></span> {{$notification->applied_for}}</p>
							  			<p><span class="{{ $notification->applicant->application_status_id == 5 ? 'text-danger' : 'text-success'}}">Status:</span> {{ $notification->applicant->application_status->name }} </p>
							  			<a href="{{ $notification->procedure_url }}" 
							  			   class="btn btn-primary mr-2 mark-read"
							  			   data-id="{{ $notification->id }}">
							  				Proceed to procedure
							  			</a>
							  		</div>
							  	</div>
							</li>
						@endforeach
					@else
						<li class="list-group-item text-center">No notifications as of the moment</li>
					@endif	
				</ul>
				{!! $notifications->links() !!}
		</div>
	</div>

@endsection