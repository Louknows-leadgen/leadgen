@extends('layouts.main')

@section('contents')

	<!-- Alert Notification here -->
	<div class="bg-notif-gen emp-alert">
		<div class="card w-25">
        <div class="card-header font-weight-bold"><!-- updated via jquery --></div>
        <div class="card-body">
            <!-- updated via jquery -->
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <!-- data-type will be added via jquery -->
            <button class="btn btn-primary rmv-employee-dtl">Yes</button>
        </div>
    </div>
	</div>


	<!-- Delete Notification here (Fixed centered) -->
	<div class="fix-mid-notif alert alert-success">
		<!-- Will be updated via jquery -->
	</div>

	
	<div class="row">
		<div class="col-md-9 mx-auto">

			<!-- Success Notification here -->
			<div class="employee-notif alert alert-success alert-dismissible fade show d-none">
				<button type="button" class="close" data-close="alert">&times;</button>
				<strong>Success!</strong> Record has been updated
			</div>

			<!-- Success Notification created record -->
			<div class="create-notif alert alert-success alert-dismissible fade show d-none">
				<button type="button" class="close" data-close="alert">&times;</button>
				<strong>Success!</strong> Record has been created
			</div>

			<div class="box mb-5">

				<div class="back">
		            <div>
		                <a class="text-primary" href="{{ URL::previous() }}">Back</a>
		            </div>
		        </div>

				<h4 class="mb-4">Employee Details</h4>
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#basic">Basic Info</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#spouse">Spouses</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#contact">Emergency Contacts</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#dependent">Dependents</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#education">Education</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#work">Work Experience</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="basic">
				  	@include('employee.personal_details.tab.basic')
				  </div>
				  <div class="tab-pane container" id="spouse">
				  	@include('employee.personal_details.tab.spouse')
				  </div>
				  <div class="tab-pane container" id="contact">
				  	@include('employee.personal_details.tab.contact')
				  </div>
				  <div class="tab-pane container" id="dependent">
				  	@include('employee.personal_details.tab.dependent')
				  </div>
				  <div class="tab-pane container" id="education">
				  	@include('employee.personal_details.tab.education')
				  </div>
				  <div class="tab-pane container" id="work">
				  	@include('employee.personal_details.tab.work')
				  </div>
				</div>
			</div>
		</div>
	</div>
	
@endsection