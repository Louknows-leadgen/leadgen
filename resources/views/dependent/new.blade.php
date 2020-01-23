<div class="dependents grp" data-id="{{$idx}}">
	<span class="remove fa fa-times-circle" title="Remove"></span>
	<div class="dependent_fullname">
		<div>Full Name</div>
		<input type="text" name="dependents[{{$idx}}][full_name]">
	</div>
	<div class="dependent_bday">
		<div>Birthday</div>
		<input type="text" class="date" name="dependents[{{$idx}}][birthday]" readonly>
	</div>
</div>