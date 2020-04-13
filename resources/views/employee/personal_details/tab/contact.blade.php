<div class="row mt-3">

	<div class="col-md-12 employee-det-header">
		<div class="pos-relative">
			<h5>List of Contacts</h5>
			<button class="btn btn-outline-success align-r employee-add-detail">+ Add Contact</button>
		</div>
	</div>

	<div class="col-md-12 form-container">

		<div class="form-item hide">
			<hr>	
			<form class="emp-det-new-form" action="{{ route('employees.create_contact') }}" method="post">
				<div class="row">
					<input type="hidden" name="employee_id" value="{{ $employee->id }}">
					<div class="col-md-6">	
						<div class="form-group">
							<label>Full name</label>
							<input type="text" name="full_name" class="form-control form-control-sm">

							<span class="full_name invalid-feedback" role="alert"></span>
						</div>

						<div class="form-group">
							<label>Contact number</label>
							<input type="text" name="contact_no" class="form-control form-control-sm">

							<span class="contact_no invalid-feedback" role="alert"></span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Relationship</label>
							<input type="text" name="relationship" class="form-control form-control-sm">

							<span class="relationship invalid-feedback" role="alert"></span>
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
						<button class="btn btn-primary mr-3">Create</button>
						<div class="d-inline-block pos-relative">
							<span class="btn btn-secondary cancel-action">Cancel</span>
						</div>
					</div>
				</div>
			</form>
		</div>

		<hr class="divider item-start-point">

		@foreach($contacts as $contact)
			@include('employee.personal_details.forms.form_contact')
		@endforeach
	
	</div>
</div>