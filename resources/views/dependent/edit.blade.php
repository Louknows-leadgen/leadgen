<form class="update" action="/dependents/{{$dependent->id}}" data-parent="grp-container" data-tab="dependent" data-id="{{$dependent->id}}">
	<div class="dependent-content grp-bg">
		<label>Full Name</label>
		<input type="text" name="full_name" value="{{ $dependent->full_name }}">
		<label>Birthday</label>
		<input type="text" class="date" name="birthday" value="{{ $dependent->birthday }}" readonly>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-container" data-tab="dependent" data-id="{{$dependent->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
	<span class="act-destroy fa fa-times-circle" data-parent="grp-container" data-id="{{$dependent->id}}" data-wrapper="info-content" data-tab="dependents" title="Remove"></span>
</form>