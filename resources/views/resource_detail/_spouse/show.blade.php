<div class="d-flex justify-content-end mb-4">
	<button class="btn btn-success new" data-id="{{$person->id}}" data-tab="spouse" data-parent="grp">Add spouse</button>
</div>
@if(count($person->spouses))
	@foreach($person->spouses as $spouse)
		<div class="grp-item mb-4">
			@include('resource_detail._spouse.show_spouse')
		</div>
	@endforeach
@else
	<p class="no-data empty">No spouses to display</p>
@endif
