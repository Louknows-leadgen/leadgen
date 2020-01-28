<form class="update" action="{{ route('rd.update_college',['college_id'=>$college->id]) }}">
	<div class="dtl-cntr">
		<label>School name</label>
		<input type="text" name="school_name" value="{{ $college->school_name }}" class="form-control">
		<span class="invalid-feedback school_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Year graduated</label>
		<input type="text" name="graduated_date" value="{{ $college->graduated_date }}" class="form-control">
		<span class="invalid-feedback graduated_date" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Degree</label>
		<input type="text" name="degree" value="{{ $college->degree }}" class="form-control">
		<span class="invalid-feedback degree" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center">
			<span class="btn btn-secondary j_abort mr-3" data-parent="grp-item" data-tab="college" data-id="{{ $college->id }}">Cancel</span>
			<span class="btn btn-danger mr-3 delete" data-parent="grp-item" data-tab="college" data-id="{{ $college->id }}">Delete</span>
			<input type="submit" class="btn btn-primary" name="update" value="Update">
		</div>
	</div>
</form>