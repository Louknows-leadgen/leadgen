<div class="dtl-cntr">
	<label>Full name</label>
	<input type="text" class="form-control" value="{{ $dependent->full_name }}" disabled>
</div>
<div class="dtl-cntr">
	<label>Birthday</label>
	<input type="text" class="form-control date" value="{{ $dependent->birthday }}" disabled>
</div>
<button class="btn btn-primary btn-block edit" 
        data-tab="dependent" 
        data-id="{{ $dependent->id }}">Edit</button>
</div>