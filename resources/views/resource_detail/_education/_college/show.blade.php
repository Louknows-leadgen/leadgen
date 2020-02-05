<div class="d-flex justify-content-end mb-4">
	<button class="btn btn-success new" data-id="{{$person->id}}" data-tab="college" data-parent="grp">Add college</button>
</div>
@if(count($person->colleges))
	@foreach($person->colleges as $college)
		<div class="grp-item mb-4">
			@include('resource_detail._education._college.show_college')
		</div>
	@endforeach
@else
	<p class="no-data empty">No colleges to display</p>
@endif
