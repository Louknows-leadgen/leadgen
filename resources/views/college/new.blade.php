<div class="colleges grp" data-id="{{$idx}}">
	<span class="remove fa fa-times-circle" title="Remove"></span>	
	<div class="edu_col_school">
		<div>School Name</div>
		<input type="text" name="colleges[{{$idx}}][school_name]">
	</div>
	<div class="edu_col_year">
		<div>Year Graduated</div>
		<input type="text" name="colleges[{{$idx}}][graduated_date]">
	</div>
	<div class="edu_col_degree">
		<div>Degree and Course</div>
		<input type="text" name="colleges[{{$idx}}][degree]">
	</div>
</div>