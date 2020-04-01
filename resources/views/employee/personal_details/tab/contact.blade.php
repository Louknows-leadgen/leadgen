<div class="row mt-3">

	<div class="col-md-12">
		<div class="pos-relative">
			<h5>List of Contacts</h5>
			<button class="btn btn-outline-success align-r">+ Add Contact</button>
		</div>
		<hr>
	</div>

	<div class="col-md-12">
		@foreach($contacts as $contact)
		<form>
			<div class="row">

				<div class="col-md-6">	
					<div class="form-group">
						<label>Full name</label>
						<input type="text" name="full_name" class="form-control form-control-sm" value="{{ $contact->full_name }}">
					</div>

					<div class="form-group">
						<label>Contact number</label>
						<input type="text" name="contact_no" class="form-control form-control-sm" value="{{ $contact->contact_no }}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Relationship</label>
						<input type="text" name="relationship" class="form-control form-control-sm" value="{{ $contact->relationship }}">
					</div>					
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control form-control-sm" value="{{ $contact->address }}">
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