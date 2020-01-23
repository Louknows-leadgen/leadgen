<div class="spouse-content grp-bg">
	<label>First Name</label>
	<input type="text" value="{{ $spouse->first_name }}" disabled>
	<label>Middle Name</label>
	<input type="text" value="{{ $spouse->middle_name }}" disabled>
	<label>Last Name</label>
	<input type="text" value="{{ $spouse->last_name }}" disabled>
	<label>Birthday</label>
	<input type="text" class="date" value="{{ $spouse->birthday }}" disabled>
	<label>Occupation</label>
	<input type="text" value="{{ $spouse->occupation }}" disabled>
	<label>Contact Number</label>
	<input type="text" value="{{ $spouse->contact_no }}" disabled>
	<div class="col-span-2 grid-col-1">
		<label>Address</label>
		<input type="text" value="{{ $spouse->address }}" disabled>
	</div>
</div>
<span class="fa fa-edit edit edit-grp-icon" data-tab="spouse" data-id="{{ $spouse->id }}" data-parent="grp-container" title="Edit"></span>