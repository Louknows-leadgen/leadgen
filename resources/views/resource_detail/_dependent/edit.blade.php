<form class="update" action="{{ route('rd.update_dependent',['dependent_id'=>$dependent->id]) }}">
	<div class="dtl-cntr">
		<label>Full name</label>
		<input type="text" name="full_name" class="form-control" value="{{ $dependent->full_name }}">
		<span class="invalid-feedback full_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Birthday</label>
		<input type="text" name="birthday" class="form-control date" value="{{ $dependent->birthday }}" autocomplete="false">
		<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group d-flex justify-content-end">
				<span class="btn btn-secondary j_abort" data-parent="grp-item" data-tab="dependent" data-id="{{ $dependent->id }}">Cancel</span>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="update" value="Update">
			</div>
		</div>
	</div>
</form>