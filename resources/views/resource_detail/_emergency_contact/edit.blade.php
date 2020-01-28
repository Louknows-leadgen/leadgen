<form class="update" action="{{ route('rd.update_contact',['contact_id'=>$contact->id]) }}">
	<div class="dtl-cntr">
		<label>Full name</label>
		<input type="text" name="full_name" class="form-control" value="{{ $contact->full_name }}">
		<span class="invalid-feedback full_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Contact number</label>
		<input type="text" name="contact_no" class="form-control" value="{{ $contact->contact_no }}">
		<span class="invalid-feedback contact_no" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Relationship</label>
		<input type="text" name="relationship" class="form-control" value="{{ $contact->relationship }}">
		<span class="invalid-feedback relationship" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" name="address" class="form-control" value="{{ $contact->address }}">
		<span class="invalid-feedback address" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group d-flex justify-content-end">
				<span class="btn btn-secondary j_abort" data-parent="grp-item" data-tab="contact" data-id="{{ $contact->id }}">Cancel</span>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="update" value="Update">
			</div>
		</div>
	</div>
</form>