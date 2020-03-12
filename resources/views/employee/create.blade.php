@extends('layouts.main')

@section('contents')
	
	<div class="row">
		<div class="col-md-9 mx-auto">
			<div class="box mb-5">

				<div class="back">
			        <div>
			            <a class="text-primary" href="{{ URL::previous() }}">Back</a>
			        </div>
			    </div>

				<h4 class="mb-4">Employee Record</h4>
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#emp_dtl">Employee Details</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="emp_dtl">
				  	@include('employee.tabs.new_employee')
				  </div>
				</div>
			</div>
		</div>
	</div>
	
@endsection