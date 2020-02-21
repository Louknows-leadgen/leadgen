@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')
	<div class="row" >
        <div class="col-md-10 mx-auto">
        	<div class="row">
        		<div class="col-md-12">
		        	@include('application._applicant-info')
	        	</div>
	        	<div class="col-md-12 mt-3 mb-5">
	        		<div class="row">
		        		<div class="col-md-12">
			        		<div class="box process">

			        			<div class="hide notif-process alert alert-success alert-dismissible fade show">
			        				You have updated the record successfully!
			        			</div>

			        			<h5>Application Process</h5>
			        			<div class="row">
									@include('application._process-nav')
									
									<div class="col-md-9 border-top border-left border-right border-bottom">
				        				<div class="dynamic-container h-100 {{in_array($applicant->application_status_id,[1,2]) ? '' : 'd-none' }}" data-tab="initial-screening">
				        					@include($init_view)
				        				</div>	
				        				<div class="dynamic-container h-100 {{in_array($applicant->application_status_id,[3,4,5,11]) ? '' : 'd-none' }}" data-tab="final-interview">
				        					@include($fin_view)
				        				</div>
				        				<div class="dynamic-container h-100 {{in_array($applicant->application_status_id,[6,7,8,9,10]) ? '' : 'd-none' }}" data-tab="job-orientation">
				        					@include($jo_view)
				        				</div>
				        			</div>	

								</div>	
			        		</div>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
	</div>		        
@endsection