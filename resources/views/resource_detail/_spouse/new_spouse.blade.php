<div class="grp-item mb-4">
	<form class="store" action="{{ route('rd.store_spouse') }}">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<div class="dtl-cntr">
			<label>First name</label>
			<input type="text" name="first_name" class="form-control">
			<span class="invalid-feedback first_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Middle name</label>
			<input type="text" name="middle_name" class="form-control">
			<span class="invalid-feedback middle_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Last name</label>
			<input type="text" name="last_name" class="form-control">
			<span class="invalid-feedback last_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Birthday</label>
			<input type="text" name="birthday" class="form-control date" autocomplete="off">
			<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Occupation</label>
			<input type="text" name="occupation" class="form-control">
		</div>
		<div class="dtl-cntr">
			<label>Contact number</label>
			<input type="text" name="contact_no" class="form-control">
			<span class="invalid-feedback contact_no" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" class="form-control">
		</div>

		<div class="row">
			<div class="col-md-12 d-flex justify-content-end">
				<span class="btn btn-secondary mr-4 cancel-new" data-parent="grp-item">Cancel</span>
				<input type="submit" name="save" class="btn btn-success pl-3 pr-3" 
			        data-tab="spouse" value="Save">
		    </div>    
		</div>
	</form>
</div>