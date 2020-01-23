<div class="grp-container new">
	<form class="work-content grp-bg create" action="/work_experiences">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<label>Employer</label>
		<input type="text" name="employer">
		<label>Role</label>
		<input type="text" name="role_name">
		<label>Start Date</label>
		<input type="text" class="date" name="start_date" readonly>
		<label>End Date</label>
		<input type="text" class="date" name="end_date" readonly>
		<label>Work Description</label>
		<textarea name="role_desc"></textarea>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="disregard act-drop">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</form>
</div>