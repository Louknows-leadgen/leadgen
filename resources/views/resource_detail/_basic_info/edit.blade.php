<form class="update" action="{{ route('rd.update_person',['person_id'=>$person->id]) }}">
	<div class="dtl-cntr">
		<label>First name</label>
		<input type="text" name="first_name" class="form-control" value="{{ $person->first_name }}">
		<span class="invalid-feedback first_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Middle name</label>
		<input type="text" name="middle_name" class="form-control" value="{{ $person->middle_name }}">
		<span class="invalid-feedback middle_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Last name</label>
		<input type="text" name="last_name" class="form-control" value="{{ $person->last_name }}">
		<span class="invalid-feedback last_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Suffix name</label>
		<input type="text" name="suffix_name" class="form-control" value="{{ $person->suffix_name }}">
	</div>
	<div class="dtl-cntr">
		<label>Mobile number 1</label>
		<input type="text" name="mobile_1" class="form-control" value="{{ $person->mobile_1 }}">
		<span class="invalid-feedback mobile_1" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Mobile number 2</label>
		<input type="text" name="mobile_2" class="form-control" value="{{ $person->mobile_2 }}">
		<span class="invalid-feedback mobile_2" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="{{ $person->email }}">
		<span class="invalid-feedback email" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Age</label>
		<input type="text" name="age" class="form-control" value="{{ $person->age }}">
		<span class="invalid-feedback age" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Gender</label>
		<select name="gender" class="custom-select">
			<option value="Male" {{ $person->gender == 'Male' ? 'selected' : '' }}>Male</option>
			<option value="Female" {{ $person->gender == 'Female' ? 'selected' : '' }}>Female</option>
		</select>
	</div>
	<div class="dtl-cntr">
		<label>Weight (kg)</label>
		<input type="number" name="weight" class="form-control" value="{{ $person->weight }}">
	</div>
	<div class="dtl-cntr">
		<label>Height (cm)</label>
		<input type="number" name="height" class="form-control" value="{{ $person->height }}">
	</div>
	<div class="dtl-cntr">
		<label>Civil status</label>
		<select name="gender" class="custom-select">
			<option value="Single" {{ $person->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
			<option value="Married" {{ $person->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
		</select>
	</div>
	<div class="dtl-cntr">
		<label>Birthday</label>
		<input type="text" name="birthday" class="form-control date" value="{{ $person->birthday }}" autocomplete="off">
		<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Religion</label>
		<input type="text" name="religion" class="form-control" value="{{ $person->religion }}">
	</div>
	<div class="dtl-cntr">
		<label>Father's name</label>
		<input type="text" name="father_name" class="form-control" value="{{ $person->father_name }}">
	</div>
	<div class="dtl-cntr">
		<label>Mother's name</label>
		<input type="text" name="mother_name" class="form-control" value="{{ $person->mother_name }}">
	</div>
	<div class="form-group">
		<label>City address</label>
		<input type="text" name="city_address" class="form-control" value="{{ $person->city_address }}">
		<span class="invalid-feedback city_address" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="form-group">
		<label>Provincial address</label>
		<input type="text" name="province_address" class="form-control" value="{{ $person->province_address }}">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group d-flex justify-content-end">
				<span class="btn btn-secondary j_abort" data-tab="basic" data-id="{{ $person->id }}" data-parent="grp">Cancel</span>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="update" value="Update">
			</div>
		</div>
	</div>
</form>