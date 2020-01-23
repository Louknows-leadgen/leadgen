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
			        		<div class="box">
			        			<h5>Application Process</h5>
			        			<div class="row">
			        				<div class="col-md-3 nopadding">
			        					<div class="p-3 text-center bg-secondary text-light">Initial Screening</div>
			        					<div class="p-3 text-center text-primary border-top border-left border-bottom actv">Final Interview</div>
			        					<div class="p-3 text-center bg-secondary text-light">Job Orientation</div>
			        				</div>
			        				<div class="col-md-9 border-top border-left border-right border-bottom">
			        					<form action="/final_interviews" method="POST">
			        						@csrf
			        						<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
				        					<div class="row">
				        						<div class="col-md-12">
				        							<h6 class="mt-3">Setup Final Interview</h6>
				        							<div class="row">
				        								<div class="col-md-4">
						        							<div class="form-group">
						        								<label>Interviewer</label>
						        								<select name="interviewer_id" class="custom-select custom-select-sm">
						        									@foreach($interviewers as $interviewer)
																		<option value="{{$interviewer->id}}">{{$interviewer->name}}</option>
																	@endforeach
						        								</select>
						        							</div>
					        							</div>
					        							<div class="col-md-4">
						        							<div class="form-group">
						        								<label>Schedule</label>
						        								<input type="text" name="schedule" class="form-control form-control-sm datetime" placeholder="mm/dd/yyyy" autocomplete="off">
						        							</div>
					        							</div>
					        							<div class="col-md-4 d-flex align-items-end justify-content-center">
						        							<div class="form-group">
						        								<input class="btn btn-primary" type="submit" name="submit" value="Submit">
						        							</div>
					        							</div>
				        							</div>
				        							<h6 class="mt-3">Interviewer's Assessment</h6>
				        							<div class="row">
				        								<div class="col-md-4">
						        							<div class="form-group">
						        								<label>Result</label>
						        								<input type="text" name="result" class="form-control form-control-sm" disabled>
						        							</div>
					        							</div>
					        							<div class="col-md-12">
						        							<div class="form-group">
						        								<label>Remarks</label>
						        								<textarea class="form-control" rows="5" name="remarks" disabled></textarea>
						        							</div>
					        							</div>
				        							</div>
				        						</div>
				        					</div>
				        				</form>	
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