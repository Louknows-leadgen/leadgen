<div class="grp-item mb-4">
	<form class="store" action="{{ route('rd.store_college') }}">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		
		<div class="dtl-cntr">
			<label>School name</label>
			<input type="text" name="school_name" class="form-control">
			<span class="invalid-feedback school_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Year graduated</label>
			<input type="text" name="graduated_date" class="form-control">
			<span class="invalid-feedback graduated_date" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Degree</label>
			<input type="text" name="degree" class="form-control">
			<span class="invalid-feedback degree" role="alert" style="grid-column-start: 2"></span>
		</div>

		<div class="row">
			<div class="col-md-12 d-flex justify-content-end">
				<span class="btn btn-secondary mr-4 cancel-new" data-parent="grp-item">Cancel</span>
				<input type="submit" name="save" class="btn btn-success pl-3 pr-3" 
			        data-tab="college" value="Save">
		    </div>    
		</div>
	</form>
</div>