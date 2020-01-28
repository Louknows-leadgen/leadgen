<form class="update" action="{{ route('rd.update_elementary',['elem_id'=>$elem->id]) }}">
	<h5>Elementary</h5>
	<div class="dtl-cntr">
		<label>School name</label>
		<input type="text" name="school_name" value="{{ $elem->school_name }}" class="form-control">
		<span class="invalid-feedback school_name" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="dtl-cntr">
		<label>Year graduated</label>
		<input type="text" name="graduated_date" value="{{ $elem->graduated_date }}" class="form-control">
		<span class="invalid-feedback graduated_date" role="alert" style="grid-column-start: 2"></span>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group d-flex justify-content-end">
				<span class="btn btn-secondary j_abort" data-parent="grp-item" data-tab="elementary" data-id="{{ $elem->id }}">Cancel</span>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="update" value="Update">
			</div>
		</div>
	</div>
</form>