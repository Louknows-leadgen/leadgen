<div class="education-content">
	<h3 class="col-span-2  margin-bot-0">Elementary School</h3>
	<div class="grp-elem col-span-2" data-id="{{$elem->id}}">
		<div class="grp-container grp-bg">
			<span class="fa fa-edit edit edit-grp-icon" data-tab="education" data-id="{{$elem->id}}" data-parent="grp-elem" title="Edit"></span>
			<label>School Name</label>
			<input type="text" value="{{ $elem->school_name }}" disabled>
			<label>Year Graduated</label>
			<input type="text" value="{{ $elem->graduated_date }}" disabled>
		</div>
	</div>
</div>
<div class="education-content  margin-bot-25">	
	<h3 class="col-span-2 margin-bot-0">High School</h3>
	<div class="col-span-2 grp-high" data-id="{{$high->id}}">
		<div class="grp-container grp-bg">
			<span class="fa fa-edit edit edit-grp-icon" data-tab="education" data-id="{{$high->id}}" data-parent="grp-high" title="Edit"></span>
			<label>School Name</label>
			<input type="text" value="{{ $high->school_name }}" disabled>
			<label>Year Graduated</label>
			<input type="text" value="{{ $high->graduated_date }}" disabled>
		</div>
	</div>
</div>
<div class="education-content degrees col-span-2">
	<span class="btn btn-add more-edit act-more-edit" data-tab="college" data-person="{{$person_id}}">+ Add College</span>
	<h3 class="col-span-2 margin-bot-0">College/s</h3>
	@if(count($colleges))
		@foreach($colleges as $college)
			<div class="grp-college col-span-2" data-id="{{$college->id}}">
				<div class="grp-container grp-bg">
					<span class="fa fa-edit edit edit-grp-icon" data-tab="college" data-id="{{$college->id}}" data-parent="grp-college" title="Edit"></span>
					<label>School Name</label>
					<input type="text" value="{{ $college->school_name }}" disabled>
					<label>Year Graduated</label>
					<input type="text" value="{{ $college->graduated_date }}" disabled>
					<label>Degree</label>
					<input type="text" value="{{ $college->degree }}" disabled>
				</div>
			</div>
		@endforeach
	@else
		<p class="col-span-2 empty"><em>No colleges to display</em></p>
	@endif
</div>