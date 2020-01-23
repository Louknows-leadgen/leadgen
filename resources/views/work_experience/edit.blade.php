<form class="update" action="/work_experiences/{{$work->id}}" data-tab="work" data-id="{{$work->id}}" data-parent="grp-container">
	<div class="work-content grp-bg">
		<label>Employer</label>
		<input type="text" name="employer" value="{{ $work->employer }}">
		<label>Role</label>
		<input type="text" name="role_name" value="{{ $work->role_name }}">
		<label>Start Date</label>
		<input type="text" class="date" name="start_date" value="{{ $work->start_date }}" readonly>
		<label>End Date</label>
		<input type="text" class="date" name="end_date" value="{{ $work->end_date }}" readonly>
		<label>Work Description</label>
		<textarea name="role_desc">{{ $work->role_desc }}</textarea>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-container" data-tab="work" data-id="{{$work->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
	<span class="act-destroy fa fa-times-circle" data-parent="grp-container" data-id="{{$work->id}}" data-wrapper="info-content" data-tab="work experiences" title="Remove"></span>
</form>