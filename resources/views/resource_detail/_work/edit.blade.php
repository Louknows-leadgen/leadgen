<form class="update" action="{{ route('rd.update_work',['work_id'=>$work->id]) }}">
	<div class="dtl-cntr">
		<label>Employer</label>
		<input type="text" name="employer" value="{{ $work->employer }}" class="form-control">
		<span class="invalid-feedback employer" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Role</label>
		<input type="text" name="role_name" value="{{ $work->role_name }}" class="form-control">
		<span class="invalid-feedback role_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Start date</label>
		<input type="text" name="start_date" value="{{ $work->start_date }}" class="form-control date" autocomplete="off">
		<span class="invalid-feedback start_date" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>End date</label>
		<input type="text" name="end_date" value="{{ $work->end_date }}" class="form-control date" autocomplete="off">
		<span class="invalid-feedback end_date" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="form-group">
		<label>Work description</label>
		<textarea name="role_desc" class="form-control" rows="5">{{ $work->role_desc }}</textarea>
		<span class="invalid-feedback role_desc" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center">
			<span class="btn btn-secondary j_abort mr-3" data-parent="grp-item" data-tab="work" data-id="{{ $work->id }}">Cancel</span>
			<span class="btn btn-danger mr-3 delete" data-parent="grp-item" data-tab="work" data-id="{{ $work->id }}">Delete</span>
			<input type="submit" class="btn btn-primary" name="update" value="Update">
		</div>
	</div>
</form>