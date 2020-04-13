<form class="employee-det-form" data-form="dependent" action="{{ route('employees.update_dependent') }}" method="put">
	<div class="row">
		<input type="hidden" name="dependent_id" value="{{ $dependent->id }}">
		<div class="col-md-6">	
			<div class="form-group">
				<label>Full name</label>
				<input type="text" name="full_name" class="form-control form-control-sm" value="{{ $dependent->full_name }}">

				<span class="full_name invalid-feedback" role="alert"></span>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Birthday</label>
				<input type="text" name="birthday" class="form-control form-control-sm date" value="{{ $dependent->birthday }}" autocomplete="off">

				<span class="birthday invalid-feedback" role="alert"></span>
			</div>					
		</div>

	</div>

	<div class="row mt-3 mb-2">
		<div class="col-md-12">
			<button class="btn btn-primary mr-3">Update</button>
			<div class="d-inline-block pos-relative">
				<span class="btn btn-danger rmv-employee-dtl-trig"
					  data-type="dependent"
					  data-id="{{ $dependent->id }}">Remove</span>
				<span class="inline-notif hide"></span>
			</div>
		</div>
	</div>
</form>

<hr class="divider">