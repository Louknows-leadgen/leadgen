<form class="update" action="{{ route('rd.update_spouse',['spouse_id'=>$spouse->id]) }}">
	<div class="dtl-cntr">
		<label>First name</label>
		<input type="text" name="first_name" class="form-control" value="{{ $spouse->first_name }}">
		<span class="invalid-feedback first_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Middle name</label>
		<input type="text" name="middle_name" class="form-control" value="{{ $spouse->middle_name }}">
		<span class="invalid-feedback middle_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Last name</label>
		<input type="text" name="last_name" class="form-control" value="{{ $spouse->last_name }}">
		<span class="invalid-feedback last_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Birthday</label>
		<input type="text" name="birthday" class="form-control date" value="{{ $spouse->birthday }}" autocomplete="off">
		<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Occupation</label>
		<input type="text" name="occupation" class="form-control" value="{{ $spouse->occupation }}">
	</div>
	<div class="dtl-cntr">
		<label>Contact number</label>
		<input type="text" name="contact_no" class="form-control" value="{{ $spouse->contact_no }}">
		<span class="invalid-feedback contact_no" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" name="address" class="form-control" value="{{ $spouse->address }}">
	</div>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center">
			<span class="btn btn-secondary j_abort mr-3" data-parent="grp-item" data-tab="spouse" data-id="{{ $spouse->id }}">Cancel</span>
			<span class="btn btn-danger mr-3 delete" data-parent="grp-item" data-tab="spouse" data-id="{{ $spouse->id }}">Delete</span>
			<input type="submit" class="btn btn-primary" name="update" value="Update">
		</div>
	</div>
</form>