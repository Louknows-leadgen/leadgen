<div class="grp-container new">
	<form class="spouse-content grp-bg create" action="/spouses">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<label>First Name</label>
		<input type="text" name="first_name">
		<label>Middle Name</label>
		<input type="text" name="middle_name">
		<label>Last Name</label>
		<input type="text" name="last_name">
		<label>Birthday</label>
		<input type="text" class="date" name="birthday" readonly>
		<label>Occupation</label>
		<input type="text" name="occupation">
		<label>Contact Number</label>
		<input type="text" name="contact_no">
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