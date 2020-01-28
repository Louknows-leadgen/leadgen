<form class="update" action="{{ route('rd.update_dependent',['dependent_id'=>$dependent->id]) }}">
	<div class="dtl-cntr">
		<label>Full name</label>
		<input type="text" name="full_name" class="form-control" value="{{ $dependent->full_name }}">
		<span class="invalid-feedback full_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Birthday</label>
		<input type="text" name="birthday" class="form-control date" value="{{ $dependent->birthday }}" autocomplete="off">
		<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center">
			<span class="btn btn-secondary j_abort mr-3" data-parent="grp-item" data-tab="dependent" data-id="{{ $dependent->id }}">Cancel</span>
			<span class="btn btn-danger mr-3 delete" data-parent="grp-item" data-tab="dependent" data-id="{{ $dependent->id }}">Delete</span>
			<input type="submit" class="btn btn-primary" name="update" value="Update">
		</div>
	</div>
</form>