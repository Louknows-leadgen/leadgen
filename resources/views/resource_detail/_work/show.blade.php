@if(count($works))
	@foreach($works as $work)
		<div class="grp-item mb-4">
			<div class="dtl-cntr">
				<label>Employer</label>
				<input type="text" class="form-control" value="{{ $work->employer }}" disabled>
			</div>
			<div class="dtl-cntr">
				<label>Role</label>
				<input type="text" class="form-control" value="{{ $work->role_name }}" disabled>
			</div>
			<div class="dtl-cntr">
				<label>Start date</label>
				<input type="text" class="form-control date" value="{{ $work->start_date }}" disabled>
			</div>
			<div class="dtl-cntr">
				<label>End date</label>
				<input type="text" class="form-control date" value="{{ $work->end_date }}" disabled>
			</div>
			<div class="form-group">
				<label>Work description</label>
				<textarea class="form-control" rows="5" disabled>{{ $work->role_desc }}</textarea>
			</div>
			<button class="btn btn-primary btn-block edit" 
			        data-tab="work" 
			        data-id="{{ $work->id }}">Edit</button>
			</div>
		</div>
	@endforeach
@else
	<p class="no-data empty">No work experiences to display</p>
@endif
