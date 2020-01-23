<div class="dependent-content grp-bg">
	<label>Full Name</label>
	<input type="text" value="{{ $dependent->full_name }}" disabled>
	<label>Birthday</label>
	<input type="text" class="date" value="{{ $dependent->birthday }}" disabled>
</div>
<span class="fa fa-edit edit edit-grp-icon" data-tab="dependent" data-id="{{$dependent->id}}" data-parent="grp-container" title="Edit"></span>