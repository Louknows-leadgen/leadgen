<div class="row">
	<div class="col-md-12">
		<h6>Elementary</h6>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="form-group col-md-5">
				<label class="req">School name:</label>
				<input type="text" name="schools[0][school_name]" class="form-control form-control-sm validate @error('schools.0.school_name') is-invalid @enderror" value="{{old('schools.0.school_name')}}">
				<input type="hidden" name="schools[0][education_type]" value="1">
				<span class="invalid-feedback" role="alert">
					@error('schools.0.school_name') {{$message}} @enderror
				</span>
			</div>
			<div class="col-md-2">
				<label class="req">Year graduated:</label>
				<input type="text" name="schools[0][graduated_date]" class="form-control form-control-sm validate @error('schools.0.graduated_date') is-invalid @enderror" value="{{old('schools.0.graduated_date')}}">
				<span class="invalid-feedback" role="alert">
					@error('schools.0.graduated_date') {{$message}} @enderror
				</span>
			</div>
		</div>
	</div>
</div>