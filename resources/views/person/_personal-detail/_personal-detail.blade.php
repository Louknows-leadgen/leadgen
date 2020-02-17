<div class="box col-md-12 mb-4">
	<h5>Personal Data</h5>
	<div class="row">
		<div class="form-group col-md-3">
			<label class="req">First name:</label>
			<input type="text" name="person[first_name]"  class="form-control form-control-sm validate @error('person.first_name') is-invalid @enderror" value="{{old('person.first_name')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.first_name') {{$message}} @enderror
			</span>
		</div>
		<div class="form-group col-md-3">
			<label class="req">Middle name:</label>
			<input type="text" name="person[middle_name]" class="form-control form-control-sm validate @error('person.middle_name') is-invalid @enderror" value="{{old('person.middle_name')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.middle_name') {{$message}} @enderror
			</span>	
		</div>
		<div class="form-group col-md-3">
			<label class="req">Last name:</label>
			<input type="text" name="person[last_name]" class="form-control form-control-sm validate @error('person.last_name') is-invalid @enderror" value="{{old('person.last_name')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.last_name') {{$message}} @enderror
			</span>	
		</div>
		<div class="form-group col-md-3">
			<label>Suffix (eg. Jr., Sr.):</label>
			<input type="text" name="person[suffix_name]" class="form-control form-control-sm" value="{{old('person.suffix_name')}}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<label class="req">Mobile 1:</label>
			<input type="text" name="person[mobile_1]" class="form-control form-control-sm validate @error('person.mobile_1') is-invalid @enderror" value="{{old('person.mobile_1')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.mobile_1') {{$message}} @enderror
			</span>	
		</div>
		<div class="form-group col-md-3">
			<label>Mobile 2:</label>
			<input type="text" name="person[mobile_2]" class="form-control form-control-sm validate @error('person.mobile_2') is-invalid @enderror" value="{{old('person.mobile_2')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.mobile_2') {{$message}} @enderror
			</span>
		</div>
		<div class="form-group col-md-3">
			<label class="req">Email:</label>
			<input type="email" name="person[email]" class="form-control form-control-sm validate @error('person.email') is-invalid @enderror" value="{{old('person.email')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.email') {{$message}} @enderror
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="req">Age:</label>
					<input type="number" name="person[age]" class="form-control form-control-sm validate @error('person.age') is-invalid @enderror" value="{{old('person.age')}}">
					<span class="invalid-feedback" role="alert">
						@error('person.age') {{$message}} @enderror
					</span>
				</div>
				<div class="form-group col-md-6">
					<label>Gender:</label>
					<select name="person[gender]" class="custom-select custom-select-sm">
						<option value="Male" {{ old('person.gender') == 'Male' ? 'selected' : '' }}>Male</option>
						<option value="Female" {{ old('person.gender') == 'Female' ? 'selected' : '' }}>Female</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group col-md-3">
			<label class="req">Birthday:</label>
			<input type="text" name="person[birthday]" class="form-control form-control-sm date validate @error('person.birthday') is-invalid @enderror" value="{{old('person.birthday')}}" placeholder="mm/dd/yyyy" autocomplete="off">
			<span class="invalid-feedback" role="alert">
				@error('person.birthday') {{$message}} @enderror
			</span>
		</div>
		<div class="form-group col-md-3">
			<label>Civil Status:</label>
			<select name="person[civil_status]" class="custom-select custom-select-sm">
				<option value="Single" {{ old('person.civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
				<option value="Married" {{ old('person.civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Religion:</label>
			<input type="text" name="person[religion]" class="form-control form-control-sm validate @error('person.religion') is-invalid @enderror" value="{{old('person.religion')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.religion') {{$message}} @enderror
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="form-group col-md-6">
					<label>Weight (kg):</label>
					<input type="number" name="person[weight]" class="form-control form-control-sm" value="{{old('person.weight')}}">
				</div>
				<div class="form-group col-md-6">
					<label>Height (cm):</label>
					<input type="number" name="person[height]" class="form-control form-control-sm" value="{{old('person.height')}}">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12">
			<label class="req">City Address:</label>
			<input type="text" name="person[city_address]" class="form-control form-control-sm validate @error('person.city_address') is-invalid @enderror" value="{{old('person.city_address')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.city_address') {{$message}} @enderror
			</span>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12">
			<label>Provincial Address:</label>
			<input type="text" name="person[province_address]" class="form-control form-control-sm" value="{{old('person.province_address')}}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<label>Father's name:</label>
			<input type="text" name="person[father_name]" class="form-control form-control-sm validate @error('person.father_name') is-invalid @enderror" value="{{old('person.father_name')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.father_name') {{$message}} @enderror
			</span>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<label>Mother's name:</label>
			<input type="text" name="person[mother_name]" class="form-control form-control-sm validate @error('person.mother_name') is-invalid @enderror" value="{{old('person.mother_name')}}">
			<span class="invalid-feedback" role="alert">
				@error('person.mother_name') {{$message}} @enderror
			</span>
		</div>
	</div>
</div>

