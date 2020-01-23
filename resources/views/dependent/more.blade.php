<div class="grp-container new">
	<form class="dependent-content grp-bg create" action="/dependents">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<label>Full Name</label>
		<input type="text" name="full_name">
		<label>Birthday</label>
		<input type="text" class="date" name="birthday" readonly>
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="disregard act-drop">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</form>
</div>