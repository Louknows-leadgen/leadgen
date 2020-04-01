<div class="row mt-3">
	<div class="col-md-12">
		<form>
			<h5>Elementary</h5>			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $elem->school_name }}">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm date" value="{{ $elem->graduated_date }}">
					</div>					
				</div>

				<div class="col-md-3">
						<div class="form-group">
							<label>&nbsp;</label>
							<button class="btn btn-sm btn-primary d-block">Update</button>
						</div>					
					</div>
			</div>
		</form>	

		<hr>

		<form>
			<h5>High School</h5>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $high->school_name }}">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm date" value="{{ $high->graduated_date }}">
					</div>					
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>&nbsp;</label>
						<button class="btn btn-sm btn-primary d-block">Update</button>
					</div>					
				</div>
			</div>
		</form>

		<hr>

		<div class="pos-relative">
			<h5>College/s</h5>
			<button class="btn btn-outline-success align-r">+ Add College</button>
		</div>
		<hr>

		@foreach($colleges as $college)
		<form>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $college->school_name }}">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm date" value="{{ $college->graduated_date }}">
					</div>					
				</div>

				<div class="col-md-9">
					<div class="form-group">
						<label>Degree</label>
						<input type="text" name="degree" class="form-control form-control-sm" value="{{ $college->degree }}">
					</div>
				</div>

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