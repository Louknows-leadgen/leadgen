<div class="grp-container grp-bg">
	<span class="fa fa-edit edit edit-grp-icon" data-tab="college" data-id="{{$college->id}}" data-parent="grp-college" title="Edit"></span>
	<label>School Name</label>
	<input type="text" value="{{ $college->school_name }}" disabled>
	<label>Year Graduated</label>
	<input type="text" value="{{ $college->graduated_date }}" disabled>
	<label>Degree</label>
	<input type="text" value="{{ $college->degree }}" disabled>
</div>