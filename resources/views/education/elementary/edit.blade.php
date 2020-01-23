<form class="update" action="/educations/{{$elem->id}}" data-parent="grp-elem" data-tab="education" data-id="{{$elem->id}}">
	<div class="grp-container grp-bg">	
		<label>School Name</label>
		<input type="text" name="school_name" name="school_name" value="{{ $elem->school_name }}">
		<label>Graduated Date</label>
		<input type="text" name="graduated_date" name="graduated_date" value="{{ $elem->graduated_date }}">
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-elem" data-tab="education" data-id="{{$elem->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>	
</form>