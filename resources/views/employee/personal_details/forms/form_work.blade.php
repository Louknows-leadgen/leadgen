<form class="employee-det-form" action="{{ route('employees.update_work') }}" method='put'>
	<div class="row">
		<input type="hidden" name="work_id" value="{{ $work->id }}">
		<div class="col-md-6">	
			<div class="form-group">
				<label>Employer</label>
				<input type="text" name="employer" class="form-control form-control-sm" value="{{ $work->employer }}">

				<span class="employer invalid-feedback" role="alert"></span>
			</div>

			<div class="form-group">
				<label>Role</label>
				<input type="text" name="role_name" class="form-control form-control-sm" value="{{ $work->role_name }}">

				<span class="role_name invalid-feedback" role="alert"></span>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Start date</label>
				<input type="text" name="start_date" class="form-control form-control-sm date" value="{{ $work->start_date }}" autocomplete="off">

				<span class="start_date invalid-feedback" role="alert"></span>
			</div>

			<div class="form-group">
				<label>End date</label>
				<input type="text" name="end_date" class="form-control form-control-sm date" value="{{ $work->end_date }}" autocomplete="off">

				<span class="end_date invalid-feedback" role="alert"></span>
			</div>					
		</div>

	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Role description</label>
				<!-- important: class and id should be named ckeditor -->
				<textarea class="ckeditor" id="ckeditor" name="role_desc">{{ $work->role_desc }}</textarea>
			</div>
		</div>
	</div>

	<div class="row mt-3 mb-2">
		<div class="col-md-12">
			<button class="btn btn-primary mr-3">Update</button>
			<div class="d-inline-block pos-relative">
				<span class="btn btn-danger rmv-employee-dtl-trig"
				      data-type="work"
				      data-id="{{ $work->id }}">Remove</span>
				<span class="inline-notif hide"></span>
			</div>
		</div>
	</div>
</form>

<hr class="divider">