<div class="grp-item mb-4">
	<form class="store" action="{{ route('rd.store_contact') }}">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		
		<div class="dtl-cntr">
			<label>Full name</label>
			<input type="text" name="full_name" class="form-control">
			<span class="invalid-feedback full_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Contact number</label>
			<input type="text" name="contact_no" class="form-control">
			<span class="invalid-feedback contact_no" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Relationship</label>
			<input type="text" name="relationship" class="form-control">
			<span class="invalid-feedback relationship" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" class="form-control">
			<span class="invalid-feedback address" role="alert" style="grid-column-start: 2"></span>
		</div>

		<div class="row">
			<div class="col-md-12 d-flex justify-content-end">
				<span class="btn btn-secondary mr-4 cancel-new" data-parent="grp-item">Cancel</span>
				<input type="submit" name="save" class="btn btn-success pl-3 pr-3" 
			        data-tab="contact" value="Save">
		    </div>    
		</div>
	</form>
</div>