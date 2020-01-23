<div class="grp-college col-span-2 new">
	<form class="grp-container grp-bg create" action="/colleges">
		<input type="hidden" name="person_id" value="{{$person_id}}">
		<label>School Name</label>
		<input type="text" name="school_name">
		<label>Year Graduated</label>
		<input type="text" name="graduated_date">
		<label>Degree</label>
		<input type="text" name="degree">
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="disregard act-drop">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</form>
</div>