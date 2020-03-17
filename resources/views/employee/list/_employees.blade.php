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
			  			<p>
			  				<span class="fa fa-briefcase text-muted"></span> {{$employee->job_name}}
			  			</p>
			  			<a href="{{ route('employees.show',['employee'=>$employee->id]) }}" class="btn btn-primary mr-2">Details</a>
			  			@if($status == 'active')
			  				<a href="{{route('blacklists.blacklist_employee',['id'=>$employee->id])}}" class="btn btn-secondary">Blacklist</a>
			  			@endif
			  		</div>
			  	</div>
			</li>
		@endforeach
	@else
		<li class="list-group-item text-center">No results found</li>
	@endif	
</ul>
{!! $employees->links() !!}