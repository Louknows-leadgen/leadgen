
<h5>Elementary</h5>
<div class="dtl-cntr">
	<label>School name</label>
	<input type="text" class="form-control" value="{{ $elem->school_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Year graduated</label>
	<input type="text" class="form-control" value="{{ $elem->graduated_date }}" disabled>
</div>
<button class="btn btn-primary btn-block edit" 
        data-tab="elementary" 
        data-id="{{ $elem->id }}">Edit</button>
</div>