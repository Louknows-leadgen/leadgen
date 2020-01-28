<div class="dtl-cntr">
	<label>First name</label>
	<input type="text" class="form-control" value="{{ $spouse->first_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Middle name</label>
	<input type="text" class="form-control" value="{{ $spouse->middle_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Last name</label>
	<input type="text" class="form-control" value="{{ $spouse->last_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Birthday</label>
	<input type="text" class="form-control date" value="{{ $spouse->birthday }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Occupation</label>
	<input type="text" class="form-control" value="{{ $spouse->occupation }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Contact number</label>
	<input type="text" class="form-control" value="{{ $spouse->contact_no }}" disabled>
</div>
<div class="form-group">
	<label>Address</label>
	<input type="text" class="form-control" value="{{ $spouse->address }}" disabled>
</div>
<button class="btn btn-primary btn-block edit" 
        data-tab="spouse" 
        data-id="{{ $spouse->id }}">Edit</button>