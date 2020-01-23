<form class="update" action="/spouses/{{$spouse->id}}" data-parent="grp-container" data-tab="spouse" data-id="{{$spouse->id}}">
	<div class="spouse-content grp-bg">
		<label>First Name</label>
		<input type="text" name="first_name" value="{{ $spouse->first_name }}">
		<label>Middle Name</label>
		<input type="text" name="middle_name" value="{{ $spouse->middle_name }}">
		<label>Last Name</label>
		<input type="text" name="last_name" value="{{ $spouse->last_name }}">
		<label>Birthday</label>
		<input type="text" class="date" name="birthday" value="{{ $spouse->birthday }}" readonly>
		<label>Occupation</label>
		<input type="text" name="occupation" value="{{ $spouse->occupation }}">
		<label>Contact Number</label>
		<input type="text" name="contact_no" value="{{ $spouse->contact_no }}">
		<div class="col-span-2 grid-col-1">
			<label>Address</label>
			<input type="text" name="address" value="{{ $spouse->address }}">
		</div>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-container" data-tab="spouse" data-id="{{ $spouse->id }}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
	<span class="act-destroy fa fa-times-circle" data-parent="grp-container" data-id="{{$spouse->id}}" data-wrapper="info-content" data-tab="spouses" title="Remove"></span>
</form>