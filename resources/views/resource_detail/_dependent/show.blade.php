<div class="d-flex justify-content-end mb-4">
	<button class="btn btn-success new" data-id="{{$person->id}}" data-tab="dependent" data-parent="grp">Add dependent</button>
</div>
@if(count($person->dependents))
	@foreach($person->dependents as $dependent)
		<div class="grp-item mb-4">
			@include('resource_detail._dependent.show_dependent')
		</div>
	@endforeach
@else
	<p class="no-data empty">No dependents to display</p>
@endif



