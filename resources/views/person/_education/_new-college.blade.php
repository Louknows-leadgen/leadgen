<div class="row mx-auto mb-4 p-4 item j_college-item" data-id="{{$idx}}">
	<span class="jc_remove fa fa-times-circle" title="Remove"></span>
	<div class="form-group col-md-5">
		<label>School name:</label>
		<input type="text" name="colleges[{{$idx}}][school_name]" class="form-control form-control-sm">
	</div>
	<div class="col-md-2">
		<label>Year graduated:</label>
		<input type="text" name="colleges[{{$idx}}][graduated_date]" class="form-control form-control-sm">
	</div>
	<div class="col-md-5">
		<label>Degree & course:</label>
		<input type="text" name="colleges[{{$idx}}][degree]" class="form-control form-control-sm">
	</div>
</div>