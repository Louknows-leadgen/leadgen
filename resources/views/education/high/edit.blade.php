<form class="update" action="/educations/{{$high->id}}" data-parent="grp-high" data-tab="education" data-id="{{$high->id}}">
	<div class="grp-container grp-bg">
		<label>School Name</label>
		<input type="text" name="school_name" value="{{ $high->school_name }}">
		<label>Graduated Date</label>
		<input type="text" name="graduated_date" value="{{ $high->graduated_date }}">
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-high" data-tab="education" data-id="{{$high->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
</form>