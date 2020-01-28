
	<div class="dtl-cntr">
		<label>First name</label>
		<input type="text" class="form-control" value="{{ $person->first_name }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Middle name</label>
		<input type="text" class="form-control" value="{{ $person->middle_name }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Last name</label>
		<input type="text" class="form-control" value="{{ $person->last_name }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Suffix name</label>
		<input type="text" class="form-control" value="{{ $person->suffix_name }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Mobile number 1</label>
		<input type="text" class="form-control" value="{{ $person->mobile_1 }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Mobile number 2</label>
		<input type="text" class="form-control" value="{{ $person->mobile_2 }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Email</label>
		<input type="text" class="form-control" value="{{ $person->email }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Age</label>
		<input type="text" class="form-control" value="{{ $person->age }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Gender</label>
		<input type="text" class="form-control" value="{{ $person->gender }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Weight (kg)</label>
		<input type="text" class="form-control" value="{{ $person->weight }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Height (cm)</label>
		<input type="text" class="form-control" value="{{ $person->height }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Civil status</label>
		<input type="text" class="form-control" value="{{ $person->civil_status }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Birthday</label>
		<input type="text" class="form-control date" value="{{ $person->birthday }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Religion</label>
		<input type="text" class="form-control" value="{{ $person->religion }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Father's name</label>
		<input type="text" class="form-control" value="{{ $person->father_name }}" disabled>
	</div>
	<div class="dtl-cntr">
		<label>Mother's name</label>
		<input type="text" class="form-control" value="{{ $person->mother_name }}" disabled>
	</div>
	<div class="form-group">
		<label>City address</label>
		<input type="text" class="form-control" value="{{ $person->city_address }}" disabled>
	</div>
	<div class="form-group">
		<label>Provincial address</label>
		<input type="text" class="form-control" value="{{ $person->province_address }}" disabled>
	</div>
	<button class="btn btn-primary btn-block edit mb-4" 
	        data-tab="basic" 
	        data-id="{{ $person->id }}">Edit</button>
	</div>
