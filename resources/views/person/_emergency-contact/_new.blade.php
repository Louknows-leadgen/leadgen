<div class="row mx-auto mb-4 p-4 item j_contact-item" data-id="{{$idx}}">
	<span class="jc_remove fa fa-times-circle" title="Remove"></span>
	<div class="col-md-12">
		<div class="row">
			<div class="form-group col-md-4">
				<label>Full name:</label>
				<input type="text" name="emergency_contacts[{{$idx}}][full_name]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label>Contact number:</label>
				<input type="text" name="emergency_contacts[{{$idx}}][contact_no]"  class="form-control form-control-sm validate" placeholder="eg. 09123456789 or 414-1234">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label>Relationship:</label>
				<input type="text" name="emergency_contacts[{{$idx}}][relationship]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label>Address:</label>
				<input type="text" name="emergency_contacts[{{$idx}}][address]"  class="form-control form-control-sm">
			</div>
		</div>
	</div>
</div>