<div class="row mt-3">

	<div class="col-md-12">
		<div class="pos-relative">
			<h5>List of work experiences</h5>
			<button class="btn btn-outline-success align-r">+ Add Experience</button>
		</div>
		<hr>
	</div>

	<div class="col-md-12">
		@foreach($works as $work)
		<form>
			<div class="row">

				<div class="col-md-6">	
					<div class="form-group">
						<label>Employer</label>
						<input type="text" name="employer" class="form-control form-control-sm" value="{{ $work->employer }}">
					</div>

					<div class="form-group">
						<label>Role</label>
						<input type="text" name="role_name" class="form-control form-control-sm" value="{{ $work->role_name }}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Start date</label>
						<input type="text" name="start_date" class="form-control form-control-sm date" value="{{ $work->start_date }}">
					</div>

					<div class="form-group">
						<label>End date</label>
						<input type="text" name="end_date" class="form-control form-control-sm date" value="{{ $work->end_date }}">
					</div>					
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Role description</label>
						<textarea class="ckeditor" name="role_desc">{{ $work->role_desc }}</textarea>
					</div>
				</div>
			</div>

			<div class="row mt-3 mb-2">
				<div class="col-md-12">
					<button class="btn btn-primary mr-3">Update</button>
					<span class="btn btn-danger">Remove</span>
				</div>
			</div>
		</form>

		<hr class="divider">
		@endforeach
	</div>
</div>