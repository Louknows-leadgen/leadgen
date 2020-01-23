<div class="grp-container grp-bg">
	<span class="fa fa-edit edit edit-grp-icon" data-tab="education" data-id="{{$elem->id}}" data-parent="grp-elem" title="Edit"></span>
	<label>School Name</label>
	<input type="text" value="{{ $elem->school_name }}" disabled>
	<label>Graduated Date</label>
	<input type="text" value="{{ $elem->graduated_date }}" disabled>
</div>