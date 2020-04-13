<div class="row mt-3">
	<div class="col-md-12">
		<form class="employee-det-form" action="{{ route('employees.update_basic') }}" method="put">
			<input type="hidden" name="employee_id" value="{{ $employee->id }}">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>First name</label>
						<input type="text" name="first_name" class="form-control form-control-sm" value="{{ $person->first_name }}">
						<span class="first_name invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Middle name</label>
						<input type="text" name="middle_name" class="form-control form-control-sm" value="{{ $person->middle_name }}">
					</div>

					<div class="form-group">
						<label>Last name</label>
						<input type="text" name="last_name" class="form-control form-control-sm" value="{{ $person->last_name }}">
						<span class="last_name invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Suffix name</label>
						<input type="text" name="suffix_name" class="form-control form-control-sm" value="{{ $person->suffix_name }}">
					</div>

					<div class="form-group">
						<label>Mobile 1</label>
						<input type="text" name="mobile_1" class="form-control form-control-sm" value="{{ $person->mobile_1 }}">

						<span class="mobile_1 invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Mobile 2</label>
						<input type="text" name="mobile_2" class="form-control form-control-sm" value="{{ $person->mobile_2 }}">

						<span class="mobile_2 invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control form-control-sm" value="{{ $person->email }}">

						<span class="email invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Age</label>
						<input type="number" name="age" class="form-control form-control-sm" value="{{ $person->age }}">

						<span class="age invalid-feedback" role="alert"></span>
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label>Gender</label>
						<select class="custom-select custom-select-sm" name="gender">
							<option value="Male" {{ $person->gender == 'Male' ? 'selected' : '' }}>Male</option>
							<option value="Female" {{ $person->gender == 'Female' ? 'selected' : '' }}>Female</option>
						</select>
					</div>

					<div class="form-group">
						<label>Weight (kg)</label>
						<input type="number" name="weight" class="form-control form-control-sm" value="{{ $person->weight }}">
					</div>

					<div class="form-group">
						<label>Height (cm)</label>
						<input type="number" name="height" class="form-control form-control-sm" value="{{ $person->height }}">
					</div>

					<div class="form-group">
						<label>Civil Status</label>
						<select name="civil_status" class="custom-select custom-select-sm">
							<option value="Single" {{ $person->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
							<option value="Married" {{ $person->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
						</select>
					</div>

					<div class="form-group">
						<label>Birthday</label>
						<input type="text" name="birthday" class="form-control form-control-sm date" value="{{ $person->birthday }}">

						<span class="birthday invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Religion</label>
						<input type="text" name="religion" class="form-control form-control-sm" value="{{ $person->religion }}">
					</div>

					<div class="form-group">
						<label>Father's name</label>
						<input type="text" name="father_name" class="form-control form-control-sm" value="{{ $person->father_name }}">
					</div>

					<div class="form-group">
						<label>Mother's name</label>
						<input type="text" name="mother_name" class="form-control form-control-sm" value="{{ $person->mother_name }}">
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>City address</label>
						<input type="text" name="city_address" class="form-control form-control-sm" value="{{ $person->city_address }}">

						<span class="city_address invalid-feedback" role="alert"></span>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Provincial address</label>
						<input type="text" name="province_address" class="form-control form-control-sm" value="{{ $person->province_address }}">
					</div>
				</div>
			</div>

			<div class="row mt-3 mb-2">
				<div class="col-md-12">
					<button class="btn btn-primary">Update</button>
					<span class="inline-notif hide"></span>
				</div>
			</div>

		</form>
	</div>
</div>