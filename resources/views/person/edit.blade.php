<form class="update" action="/persons/{{$person->id}}" data-parent="info-content" data-tab="basic" data-id="{{$person->id}}">
	<div class="basic-content">
		<label>First Name</label>
		<input type="text" name="first_name" value="{{ $person->first_name }}">
		<label>Middle Name</label>
		<input type="text" name="middle_name" value="{{ $person->middle_name }}">
		<label>Last Name</label>
		<input type="text" name="last_name" value="{{ $person->last_name }}">
		<label>Suffix Name</label>
		<input type="text" name="suffix_name" value="{{ $person->suffix_name }}">
		<label>Mobile Number 1</label>
		<input type="text" name="mobile_1" value="{{ $person->mobile_1 }}">
		<label>Mobile Number 2</label>
		<input type="text" name="mobile_2" value="{{ $person->mobile_2 }}">
		<label>Email</label>
		<input type="text" name="email" value="{{ $person->email }}">
		<label>Age</label>
		<input type="text" name="age" value="{{ $person->age }}">
		<label>Gender</label>
		<input type="text" name="gender" value="{{ $person->gender }}">
		<label>Weight</label>
		<input type="text" name="weight" value="{{ $person->weight }}">
		<label>Height</label>
		<input type="text" name="height" value="{{ $person->height }}">
		<label>Civil Status</label>
		<input type="text" name="civil_status" value="{{ $person->civil_status }}">
		<label>Birthday</label>
		<input type="text" class="date" name="birthday" value="{{ $person->birthday }}" autocomplete="off" readonly>
		<label>Religion</label>
		<input type="text" name="religion" value="{{ $person->religion }}">
		<label>Father's Name</label>
		<input type="text" name="father_name" value="{{ $person->father_name }}">
		<label>Mother's Name</label>
		<input type="text" name="mother_name" value="{{ $person->mother_name }}">
		<div class="col-span-2 grid-col-1">
			<label>City Address</label>
			<input type="text" name="city_address" value="{{ $person->city_address }}">
		</div>
		<div class="col-span-2 grid-col-1">
			<label>Provincial Address</label>
			<input type="text" name="province_address" value="{{ $person->province_address }}">
		</div>
	</div>
	<div class="cta-col-2 width-50 margin-auto col-gap-40">
		<span class="cancel disregard" data-tab="basic" data-parent="info-content" data-id="{{$person->id}}">Cancel</span>
		<input type="submit" class="btn btn-confirm" name="submit" value="Update">
	</div>
</form>