<div class="d-flex justify-content-end mb-4">
	<button class="btn btn-success new" data-id="{{$person->id}}" data-tab="work" data-parent="grp">Add work</button>
</div>
@if(count($person->work_experiences))
	@foreach($person->work_experiences as $work)
		<div class="grp-item mb-4">
			@include('resource_detail._work.show_work')
		</div>
	@endforeach
@else
	<p class="no-data empty">No work experiences to display</p>
@endif
