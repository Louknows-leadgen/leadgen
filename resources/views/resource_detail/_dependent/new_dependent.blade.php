<div class="grp-item mb-4">
	<form class="store" action="{{ route('rd.store_dependent') }}">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		
		<div class="dtl-cntr">
			<label>Full name</label>
			<input type="text" name="full_name" class="form-control">
			<span class="invalid-feedback full_name" role="alert" style="grid-column-start: 2"></span>
		</div>
		<div class="dtl-cntr">
			<label>Birthday</label>
			<input type="text" name="birthday" class="form-control date" autocomplete="off">
			<span class="invalid-feedback birthday" role="alert" style="grid-column-start: 2"></span>
		</div>

		<div class="row">
			<div class="col-md-12 d-flex justify-content-end">
				<span class="btn btn-secondary mr-4 cancel-new" data-parent="grp-item">Cancel</span>
				<input type="submit" name="save" class="btn btn-success pl-3 pr-3" 
			        data-tab="dependent" value="Save">
		    </div>    
		</div>
	</form>
</div>