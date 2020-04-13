<form class="employee-det-form" data-form="spouse" action="{{ route('employees.update_spouse') }}" method='put'>
	<div class="row">
		<input type="hidden" name="spouse_id" value="{{ $spouse->id }}">
		<div class="col-md-6">	
			<div class="form-group">
				<label>First name</label>
				<input type="text" name="first_name" class="form-control form-control-sm" value="{{ $spouse->first_name }}">

				<span class="first_name invalid-feedback" role="alert"></span>
			</div>

			<div class="form-group">
				<label>Middle name</label>
				<input type="text" name="middle_name" class="form-control form-control-sm" value="{{ $spouse->middle_name }}">

				<span class="middle_name invalid-feedback" role="alert"></span>
			</div>

			<div class="form-group">
				<label>Last name</label>
				<input type="text" name="last_name" class="form-control form-control-sm" value="{{ $spouse->last_name }}">

				<span class="last_name invalid-feedback" role="alert"></span>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Birthday</label>
				<input type="text" name="birthday" class="form-control form-control-sm date" value="{{ $spouse->birthday }}" autocomplete="off">

				<span class="birthday invalid-feedback" role="alert"></span>
			</div>

			<div class="form-group">
				<label>Occupation</label>
				<input type="text" name="occupation" class="form-control form-control-sm" value="{{ $spouse->occupation }}">
			</div>

			<div class="form-group">
				<label>Contact number</label>
				<input type="text" name="contact_no" class="form-control form-control-sm" value="{{ $spouse->contact_no }}">

				<span class="contact_no invalid-feedback" role="alert"></span>
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
			<div class="d-inline-block pos-relative">
				<span class="btn btn-danger rmv-employee-dtl-trig" 
				      data-type="spouse"
				      data-id="{{ $spouse->id }}">Remove</span>
				<span class="inline-notif hide"></span>
			</div>
		</div>
	</div>
</form>

<hr class="divider">