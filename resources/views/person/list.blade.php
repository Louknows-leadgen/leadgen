<div class="basic-content">
	<label>First Name</label>
	<input type="text" value="{{ $person->first_name }}" disabled>
	<label>Middle Name</label>
	<input type="text" value="{{ $person->middle_name }}" disabled>
	<label>Last Name</label>
	<input type="text" value="{{ $person->last_name }}" disabled>
	<label>Suffix Name</label>
	<input type="text" value="{{ $person->suffix_name }}" disabled>
	<label>Mobile Number 1</label>
	<input type="text" value="{{ $person->mobile_1 }}" disabled>
	<label>Mobile Number 2</label>
	<input type="text" value="{{ $person->mobile_2 }}" disabled>
	<label>Email</label>
	<input type="text" value="{{ $person->email }}" disabled>
	<label>Age</label>
	<input type="text" value="{{ $person->age }}" disabled>
	<label>Gender</label>
	<input type="text" value="{{ $person->gender }}" disabled>
	<label>Weight</label>
	<input type="text" value="{{ $person->weight }}" disabled>
	<label>Height</label>
	<input type="text" value="{{ $person->height }}" disabled>
	<label>Civil Status</label>
	<input type="text" value="{{ $person->civil_status }}" disabled>
	<label>Birthday</label>
	<input type="text" class="date" value="{{ $person->birthday }}" disabled>
	<label>Religion</label>
	<input type="text" value="{{ $person->religion }}" disabled>
	<label>Father's Name</label>
	<input type="text" value="{{ $person->father_name }}" disabled>
	<label>Mother's Name</label>
	<input type="text" value="{{ $person->mother_name }}" disabled>
	<div class="col-span-2 grid-col-1">
		<label>City Address</label>
		<input type="text" value="{{ $person->city_address }}" disabled>
	</div>
	<div class="col-span-2 grid-col-1">
		<label>Provincial Address</label>
		<input type="text" value="{{ $person->province_address }}" disabled>
	</div>
</div>
<span class="fa fa-edit edit edit-icon" data-tab="basic" data-id="{{ $person->id }}" data-parent="info-content" title="Edit"></span>