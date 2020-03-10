@extends('layouts.main')

@section('contents')
	
	<div class="row">
		<div class="col-md-9 mx-auto">

			<!-- Success Notification here -->
			<div class="employee-notif alert alert-success alert-dismissible fade show d-none">
				<button type="button" class="close" data-close="alert">&times;</button>
				<strong>Success!</strong> Record has been updated
			</div>

			<div class="box mb-5">
				<h4 class="mb-4">Employee Record</h4>
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