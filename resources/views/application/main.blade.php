@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')
	<div class="row">
		<div class="col-md-2">
            <div class="box text-center">
                <div><a class="link" href="/">Applicants</a></div>
                <div><a href="#">Employees</a></div>
            </div>
        </div>
        <div class="col-md-10">
        	<div class="row">
        		<div class="col-md-12">
		        	<div class="box">
		        		<h5>Applicant's Info</h5>
		        		<div class="row d-flex justify-content-around">
		        			<div class="col-md-5">
		        				<div class="form-group">
		        					<label>Applicant's name</label>
		        					<input type="text" class="form-control form-control-sm" value="{{$applicant->person->name()}}" disabled>
		        				</div>
		        			</div>
		        			<div class="col-md-5">
		        				<div class="form-group">
		        					<label>Applied date</label>
		        					<input type="text" class="form-control form-control-sm" value="{{$applicant->applied_date()}}" disabled>
		        				</div>
		        			</div>
		        			<div class="col-md-5">
		        				<div class="form-group">
		        					<label>Applied for</label>
		        					<input type="text" class="form-control form-control-sm" value="{{$applicant->job->name}}" disabled>
		        				</div>
		        			</div>
		        			<div class="col-md-5">
		        				<div class="form-group">
		        					<label>Application status</label>
		        					<input type="text" class="form-control form-control-sm" value="{{$applicant->application_status->name}}" disabled>
		        				</div>
		        			</div>
		        		</div>
		        	</div>
	        	</div>
	        	<div class="col-md-12 mt-3 mb-5">
	        		<div class="row">
		        		<div class="col-md-12">
			        		<div class="box process">
			        			<h5>Application Process</h5>
			        			<div class="row">
									<div class="col-md-3 nopadding">
										@php 
											$icon = get_status_icon($applicant->application_status_id) 
										@endphp
										<div class="p-3 
													text-center 
													process-tab
   													{{ $icon['init'] }}
													@if(in_array($applicant->application_status_id, [1,2])) text-primary border-top border-bottom border-left actv @endif
													@if(!in_array($applicant->application_status_id, [1,2])) bg-secondary text-light @endif
													"
											 data-process="initial-screening" 
											 data-id="{{$applicant->id}}"
													>Initial Screening</div>

										<div class="p-3 
													text-center 
													process-tab  
    												{{ $icon['fi'] }}
													@if(in_array($applicant->application_status_id, [3,4,5])) text-primary border-top border-bottom border-left actv @endif
													@if(!in_array($applicant->application_status_id, [3,4,5])) bg-secondary text-light @endif
													"
											 data-process="final-interview" 
											 data-id="{{$applicant->id}}"
													>Final Interview</div>

										<div class="p-3 
													text-center 
													process-tab 
													{{ $icon['jo'] }}    
													@if(in_array($applicant->application_status_id, [6,7,8,9,10])) text-primary border-top border-bottom border-left actv @endif
													@if(!in_array($applicant->application_status_id, [6,7,8,9,10])) bg-secondary text-light @endif
													"
											 data-process="job-orientation" 
											 data-id="{{$applicant->id}}"
													>Job Orientation</div>
									</div>
									<div class="col-md-9 border-top border-left border-right border-bottom dynamic-container">
				        				@include($view)
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