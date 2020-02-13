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
			        			<h5>Application Process</h5>
			        			<div class="row">
									@include('application._process-nav')
									
									<div class="col-md-9 border-top border-left border-right border-bottom">
				        				<div class="dynamic-container h-100 {{$applicant->application_status_id > 2 ? 'd-none' : '' }}" data-tab="initial-screening">
				        					@include($init_view)
				        				</div>	
				        				<div class="dynamic-container h-100 {{$applicant->application_status_id > 5 || $applicant->application_status_id < 3 ? 'd-none' : '' }}" data-tab="final-interview">
				        					@include($fin_view)
				        				</div>
				        				<div class="dynamic-container h-100 {{$applicant->application_status_id < 6 ? 'd-none' : '' }}" data-tab="job-orientation">
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