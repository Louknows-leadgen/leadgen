<div class="row mt-3">

	<div class="col-md-12">
		<div class="pos-relative">
			<h5>List of Dependents</h5>
			<button class="btn btn-outline-success align-r">+ Add Dependent</button>
		</div>
		<hr>
	</div>

	<div class="col-md-12">
		@foreach($dependents as $dependent)
		<form>
			<div class="row">

				<div class="col-md-6">	
					<div class="form-group">
						<label>Full name</label>
						<input type="text" name="full_name" class="form-control form-control-sm" value="{{ $dependent->full_name }}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Birthday</label>
						<input type="text" name="birthday" class="form-control form-control-sm date" value="{{ $dependent->birthday }}">
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