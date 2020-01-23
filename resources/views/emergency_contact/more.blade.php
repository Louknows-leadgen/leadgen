<div class="grp-container new">
	<form class="contact-content grp-bg create" action="/emergency_contacts">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<label>Full Name</label>
		<input type="text" name="full_name">
		<label>Contact Number</label>
		<input type="text" name="contact_no">
		<label>Relationship</label>
		<input type="text" name="relationship">
		<div class="col-span-2 grid-col-1">
			<label>Address</label>
			<input type="text" name="address">
		</div>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="disregard act-drop">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</form>
</div>