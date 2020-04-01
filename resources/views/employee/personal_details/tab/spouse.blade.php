<div class="row mt-3">
	<div class="col-md-12">
		<div class="pos-relative">
			<h5>List of Spouses</h5>
			<button class="btn btn-outline-success align-r">+ Add Spouse</button>
		</div>
		<hr>
	</div>

	<div class="col-md-12">
		@foreach($spouses as $spouse)
		<form>
			<div class="row">

				<div class="col-md-6">	
					<div class="form-group">
						<label>First name</label>
						<input type="text" name="first_name" class="form-control form-control-sm" value="{{ $spouse->first_name }}">
					</div>

					<div class="form-group">
						<label>Middle name</label>
						<input type="text" name="middle_name" class="form-control form-control-sm" value="{{ $spouse->middle_name }}">
					</div>

					<div class="form-group">
						<label>Last name</label>
						<input type="text" name="last_name" class="form-control form-control-sm" value="{{ $spouse->last_name }}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Birthday</label>
						<input type="text" name="birthday" class="form-control form-control-sm date" value="{{ $spouse->birthday }}">
					</div>

					<div class="form-group">
						<label>Occupation</label>
						<input type="text" name="occupation" class="form-control form-control-sm" value="{{ $spouse->occupation }}">
					</div>

					<div class="form-group">
						<label>Contact number</label>
						<input type="text" name="contact_no" class="form-control form-control-sm" value="{{ $spouse->contact_no }}">
					</div>					
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control form-control-sm" value="{{ $spouse->address }}">
					</div>
				</div>
			</div>

			<div class="row mt-3 mb-2">
				<div class="col-md-12">
					<button class="btn btn-primary mr-3">Update</button>
					<span class="btn btn-danger">Remove</span>
				</div>
			</div>
		</form>

		<hr class="divider">
		@endforeach
	</div>
</div>