<div class="card wp-mid margin-auto margin-top-30 app-info">
	<h3>Applicant's Info</h3>
	<div class="info-card">
		<label>Applicant Name:</label>
		<input type="text" value="{{$applicant->person->name()}}" disabled>
		<label>Applied Date:</label>
		<input type="text" value="{{$applicant->applied_date()}}" disabled>
		<label>Applied For:</label>
		<input type="text" value="{{$applicant->job->name}}" disabled>
		<label>Application Status:</label>
		<input type="text" value="{{$applicant->application_status->name}}" disabled>
	</div>
</div>