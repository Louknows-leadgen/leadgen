<div class="dtl-cntr">
	<label>Full name</label>
	<input type="text" class="form-control" value="{{ $contact->full_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Contact number</label>
	<input type="text" class="form-control" value="{{ $contact->contact_no }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Relationship</label>
	<input type="text" class="form-control" value="{{ $contact->relationship }}" disabled>
</div>
<div class="form-group">
	<label>Address</label>
	<input type="text" class="form-control" value="{{ $contact->address }}" disabled>
</div>
<button class="btn btn-primary btn-block edit" 
        data-tab="contact" 
        data-id="{{ $contact->id }}">Edit</button>