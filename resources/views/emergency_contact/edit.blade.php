<form class="update" action="/emergency_contacts/{{$contact->id}}" data-parent="grp-container" data-tab="contact" data-id="{{$contact->id}}">
	<div class="contact-content grp-bg">
		<label>Full Name</label>
		<input type="text" name="full_name" value="{{ $contact->full_name }}">
		<label>Contact Number</label>
		<input type="text" name="contact_no" value="{{ $contact->contact_no }}">
		<label>Relationship</label>
		<input type="text" name="relationship" value="{{ $contact->relationship }}">
		<div class="col-span-2 grid-col-1">
			<label>Address</label>
			<input type="text" name="address" value="{{ $contact->address }}">
		</div>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-container" data-tab="contact" data-id="{{$contact->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
	<span class="act-destroy fa fa-times-circle" data-parent="grp-container" data-id="{{$contact->id}}" data-wrapper="info-content" data-tab="emergency contacts" title="Remove"></span>
</form>