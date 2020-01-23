<span class="btn btn-add more-edit act-more-edit" data-tab="work" data-person="{{$person_id}}">+ Add Work</span>
@if(count($works))
	@foreach($works as $work)
		<div class="grp-container" data-id="{{$work->id}}">
			<div class="work-content grp-bg">
				<label>Employer</label>
				<input type="text" value="{{ $work->employer }}" disabled>
				<label>Role</label>
				<input type="text" value="{{ $work->role_name }}" disabled>
				<label>Start Date</label>
				<input type="text" class="date" value="{{ $work->start_date }}" disabled>
				<label>End Date</label>
				<input type="text" class="date" value="{{ $work->end_date }}" disabled>
				<label>Work Description</label>
				<textarea disabled>{{ $work->role_desc }}</textarea>
				<span class="fa fa-edit edit edit-grp-icon" data-tab="work" data-id="{{$work->id}}" data-parent="grp-container" title="Edit"></span>
			</div>
		</div>
	@endforeach
@else
	<p class="no-data empty">No work experience to display</p>
@endif