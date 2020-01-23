<form class="update" action="/colleges/{{$college->id}}" data-tab="college" data-id="{{$college->id}}" data-parent="grp-college">
	<div class="grp-container grp-bg">
		<label>School Name</label>
		<input type="text" name="school_name" value="{{ $college->school_name }}">
		<label>Year Graduated</label>
		<input type="text" name="graduated_date" value="{{ $college->graduated_date }}">
		<label>Degree</label>
		<input type="text" name="degree" value="{{ $college->degree }}">
		<div class="cta-col-2 width-50 margin-auto col-gap-40 col-span-2">
			<span class="cancel disregard" data-parent="grp-college" data-tab="college" data-id="{{$college->id}}">Cancel</span>
			<input type="submit" class="btn btn-confirm" name="submit" value="Save">
		</div>
	</div>
	<span class="act-destroy fa fa-times-circle" data-parent="grp-college" data-id="{{$college->id}}" data-wrapper="degrees" data-tab="colleges" title="Remove"></span>
</form>