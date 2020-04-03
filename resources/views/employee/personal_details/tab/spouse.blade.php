<div class="row mt-3">
	<div class="col-md-12 employee-det-header">
		<div class="pos-relative">
			<h5>List of Spouses</h5>
			<button class="btn btn-outline-success align-r employee-add-detail">+ Add Spouse</button>
		</div>
	</div>

	<div class="col-md-12 form-container">

		<div class="form-item hide">
		<hr>	
		<form class="emp-det-new-form" action="{{ route('employees.create_spouse') }}" method='post'>
			<input type="hidden" name="employee_id" value="{{ $employee->id }}">
			<div class="row">
				<div class="col-md-6">	
					<div class="form-group">
						<label>First name</label>
						<input type="text" name="first_name" class="form-control form-control-sm">

						<span class="first_name invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Middle name</label>
						<input type="text" name="middle_name" class="form-control form-control-sm">

						<span class="middle_name invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Last name</label>
						<input type="text" name="last_name" class="form-control form-control-sm" >

						<span class="last_name invalid-feedback" role="alert"></span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Birthday</label>
						<input type="text" name="birthday" class="form-control form-control-sm date" autocomplete="off">

						<span class="birthday invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Occupation</label>
						<input type="text" name="occupation" class="form-control form-control-sm" >
					</div>

					<div class="form-group">
						<label>Contact number</label>
						<input type="text" name="contact_no" class="form-control form-control-sm" >

						<span class="contact_no invalid-feedback" role="alert"></span>
					</div>					
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control form-control-sm">
					</div>
				</div>
			</div>

			<div class="row mt-3 mb-2">
				<div class="col-md-12">
					<button class="btn btn-success mr-3">Create</button>
					<div class="d-inline-block pos-relative">
						<span class="btn btn-secondary cancel-action">Cancel</span>
					</div>
				</div>
			</div>
		</form>
		</div>

		<hr class="divider item-start-point">

		@foreach($spouses as $spouse)
			@include('employee.personal_details.forms.form_spouse')
		@endforeach
	</div>
</div>