<div class="row mx-auto mb-4 p-4 item j_spouse-item" data-id="{{$idx}}">
	<span class="jc_remove fa fa-times-circle" title="Remove"></span>
	<div class="col-md-12">
		<div class="row">
			<div class="form-group col-md-4">
				<label>First name:</label>
				<input type="text" name="spouses[{{$idx}}][first_name]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label>Middle name:</label>
				<input type="text" name="spouses[{{$idx}}][middle_name]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label>Last name:</label>
				<input type="text" name="spouses[{{$idx}}][last_name]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label>Birthday:</label>
				<input type="text" name="spouses[{{$idx}}][birthday]" class="form-control form-control-sm date validate" placeholder="mm/dd/yyyy" autocomplete="off">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label>Occupation:</label>
				<input type="text" name="spouses[{{$idx}}][occupation]"  class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-4">
				<label>Contact number:</label>
				<input type="text" name="spouses[{{$idx}}][contact_no]"  class="form-control form-control-sm validate" placeholder="eg. 09123456789 or 414-1234">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label>Address:</label>
				<input type="text" name="spouses[{{$idx}}][address]"  class="form-control form-control-sm">
			</div>
		</div>
	</div>
</div>