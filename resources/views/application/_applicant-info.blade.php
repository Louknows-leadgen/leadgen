<div class="box">

	<div class="sign-in">
        <div>
            <a class="text-primary" href="{{ URL::previous() }}">Back</a>
        </div>
    </div>
	
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