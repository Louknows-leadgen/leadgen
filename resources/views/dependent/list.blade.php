<span class="btn btn-add more-edit act-more-edit" data-tab="dependent" data-person="{{$person_id}}">+ Add Dependent</span>
@if(count($dependents))
	@foreach($dependents as $idx => $dependent)
		<div class="grp-container" data-id="{{$dependent->id}}">
			<div class="dependent-content grp-bg">
				<label>Full Name</label>
				<input type="text" value="{{ $dependent->full_name }}" disabled>
				<label>Birthday</label>
				<input type="text" class="date" value="{{ $dependent->birthday }}" disabled>
				<span class="fa fa-edit edit edit-grp-icon" data-tab="dependent" data-id="{{$dependent->id}}" data-parent="grp-container" title="Edit"></span>
			</div>
		</div>
	@endforeach
@else
	<p class="no-data empty">No dependents to display</p>
@endif