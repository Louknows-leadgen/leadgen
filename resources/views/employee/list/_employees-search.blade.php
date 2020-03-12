<ul class="list-group mb-2">
	@if(count($employees))
		@foreach($employees as $employee)
			<li class="list-group-item">
			  	<div class="row">
			  		<div class="col-md-2">
			  			<img src="{{ get_avatar($employee->gender) }}" width="100%" height="100%">
			  		</div>
			  		<div class="col-md-10">
			  			<h5>{{ implode(' ',[$employee->first_name, $employee->last_name]) }}</h5>
			  			<p><span class="fa fa-briefcase text-muted"></span> {{$employee->job_name}}</p>
			  			<a href="{{ route('employees.show',['employee'=>$employee->employee_id]) }}" class="btn btn-primary mr-2">Details</a>
			  			@if($scope == 'active')
			  				<span data-id="{{ $employee->employee_id }}" class="btn btn-secondary remove-trigger">Blacklist</span>
			  			@endif
			  		</div>
			  	</div>
			</li>
		@endforeach
	@else
		<li class="list-group-item text-center">No results found</li>
	@endif	
</ul>
{!! 
	$employees->appends(['skey'=>$skey,'dept_filter'=>$dept_filter,'scope'=>$scope])->links() 
!!}