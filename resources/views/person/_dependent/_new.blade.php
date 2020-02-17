<div class="row mx-auto mb-4 p-4 item j_dependent-item" data-id="{{$idx}}">
	<span class="jc_remove fa fa-times-circle" title="Remove"></span>
	<div class="col-md-12">
		<div class="row">
			<div class="form-group col-md-8">
				<label class="req">Full name:</label>
				<input type="text" name="dependents[{{$idx}}][full_name]" class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-4">
				<label class="req">Birthday:</label>
				<input type="text" name="dependents[{{$idx}}][birthday]" class="form-control form-control-sm date validate" placeholder="mm/dd/yyyy" autocomplete="off">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
		</div>
	</div>
</div>