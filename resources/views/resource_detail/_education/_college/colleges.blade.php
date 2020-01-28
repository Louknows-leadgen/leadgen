@if(count($colleges))
	@foreach($colleges as $college)
		<div class="grp-item mb-4">
			<div class="dtl-cntr">
				<label>School name</label>
				<input type="text" class="form-control" value="{{ $college->school_name }}" disabled>
			</div>
			<div class="dtl-cntr">
				<label>Year graduated</label>
				<input type="text" class="form-control" value="{{ $college->graduated_date }}" disabled>
			</div>
			<div class="dtl-cntr">
				<label>Degree</label>
				<input type="text" class="form-control" value="{{ $college->degree }}" disabled>
			</div>
			<button class="btn btn-primary btn-block edit" 
			        data-tab="college" 
			        data-id="{{ $college->id }}">Edit</button>
			</div>
		</div>
	@endforeach
@else
	<p class="no-data empty">No colleges to display</p>
@endif
