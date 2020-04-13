<div class="row mt-3">

	<div class="col-md-12 employee-det-header">
		<div class="pos-relative">
			<h5>List of Dependents</h5>
			<button class="btn btn-outline-success align-r employee-add-detail">+ Add Dependent</button>
		</div>
	</div>

	<div class="col-md-12 form-container">
		<div class="form-item hide">
			<hr>	
			<form class="emp-det-new-form" action="{{ route('employees.create_dependent') }}" method="post">
				<div class="row">
					<input type="hidden" name="employee_id" value="{{ $employee->id }}">
					<div class="col-md-6">	
						<div class="form-group">
							<label>Full name</label>
							<input type="text" name="full_name" class="form-control form-control-sm">

							<span class="full_name invalid-feedback" role="alert"></span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Birthday</label>
							<input type="text" name="birthday" class="form-control form-control-sm date" autocomplete="off">

							<span class="birthday invalid-feedback" role="alert"></span>
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

		@foreach($dependents as $dependent)
			@include('employee.personal_details.forms.form_dependent')
		@endforeach
	</div>
</div>