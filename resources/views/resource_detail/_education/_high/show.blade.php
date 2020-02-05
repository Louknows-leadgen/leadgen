<h5>High School</h5>
<div class="dtl-cntr">
	<label>School name</label>
	<input type="text" class="form-control" value="{{ $person->high()->school_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Year graduated</label>
	<input type="text" class="form-control" value="{{ $person->high()->graduated_date }}" disabled>
</div>
<button class="btn btn-primary btn-block edit" 
        data-tab="high" 
        data-id="{{ $person->high()->id }}">Edit</button>
