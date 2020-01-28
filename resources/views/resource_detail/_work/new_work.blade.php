<div class="grp-item mb-4">
	<form class="store" action="{{ route('rd.store_work') }}">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		
		<div class="dtl-cntr">
			<label>Employer</label>
			<input type="text" name="employer" class="form-control">
			<span class="invalid-feedback employer" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Role</label>
			<input type="text" name="role_name" class="form-control">
			<span class="invalid-feedback role_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Start date</label>
			<input type="text" name="start_date" class="form-control date" autocomplete="off">
			<span class="invalid-feedback start_date" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>End date</label>
			<input type="text" name="end_date" class="form-control date" autocomplete="off">
			<span class="invalid-feedback end_date" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="form-group">
			<label>Work description</label>
			<textarea name="role_desc" class="form-control" rows="5"></textarea>
			<span class="invalid-feedback role_desc" role="alert" style="grid-column-start: 2"></span>
		</div>

		<div class="row">
			<div class="col-md-12 d-flex justify-content-end">
				<span class="btn btn-secondary mr-4 cancel-new" data-parent="grp-item">Cancel</span>
				<input type="submit" name="save" class="btn btn-success pl-3 pr-3" 
			        data-tab="work" value="Save">
		    </div>    
		</div>
	</form>
</div>