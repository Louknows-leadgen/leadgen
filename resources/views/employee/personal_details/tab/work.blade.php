<div class="row mt-3">

	<div class="col-md-12 employee-det-header">
		<div class="pos-relative">
			<h5>List of work experiences</h5>
			<button class="btn btn-outline-success align-r employee-add-detail">+ Add Experience</button>
		</div>
	</div>

	<div class="col-md-12 form-container">

		<div class="form-item hide">
			<hr>	
			<form class="emp-det-new-form" action="{{ route('employees.create_work') }}" method='post'>
				<div class="row">
					<input type="hidden" name="employee_id" value="{{ $employee->id }}">
					<div class="col-md-6">	
						<div class="form-group">
							<label>Employer</label>
							<input type="text" name="employer" class="form-control form-control-sm">

							<span class="employer invalid-feedback" role="alert"></span>
						</div>

						<div class="form-group">
							<label>Role</label>
							<input type="text" name="role_name" class="form-control form-control-sm">

							<span class="role_name invalid-feedback" role="alert"></span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Start date</label>
							<input type="text" name="start_date" class="form-control form-control-sm date" autocomplete="off">

							<span class="start_date invalid-feedback" role="alert"></span>
						</div>

						<div class="form-group">
							<label>End date</label>
							<input type="text" name="end_date" class="form-control form-control-sm date" autocomplete="off">

							<span class="end_date invalid-feedback" role="alert"></span>
						</div>					
					</div>

				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Role description</label>
							<textarea class="ckeditor" name="role_desc"></textarea>
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

		@foreach($works as $work)
			@include('employee.personal_details.forms.form_work')
		@endforeach
	</div>
</div>