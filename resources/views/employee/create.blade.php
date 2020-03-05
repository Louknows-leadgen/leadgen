@extends('layouts.main')

@section('contents')
	
	<div class="row">
		<div class="col-md-9 mx-auto">
			<div class="box mb-5">
				<h4 class="mb-4">New Employee</h4>
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#emp_dtl">Employee Details</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#gov_dtl">Government Details</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#comp">Compensation</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="emp_dtl">
				  	@include('employee.tabs.employee_details')
				  </div>
				  <div class="tab-pane container fade" id="gov_dtl">
				  	@include('employee.tabs.government_details')
				  </div>
				  <div class="tab-pane container fade" id="comp">
				  	@include('employee.tabs.compensation')
				  </div>
				</div>
			</div>
		</div>
	</div>
	
@endsection