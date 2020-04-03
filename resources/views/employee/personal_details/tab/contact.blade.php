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
		<form class="employee-det-form" action="{{ route('employees.update_contact') }}" method="put">
			<div class="row">
				<input type="hidden" name="contact_id" value="{{ $contact->id }}">
				<div class="col-md-6">	
					<div class="form-group">
						<label>Full name</label>
						<input type="text" name="full_name" class="form-control form-control-sm" value="{{ $contact->full_name }}">

						<span class="full_name invalid-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label>Contact number</label>
						<input type="text" name="contact_no" class="form-control form-control-sm" value="{{ $contact->contact_no }}">

						<span class="contact_no invalid-feedback" role="alert"></span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Relationship</label>
						<input type="text" name="relationship" class="form-control form-control-sm" value="{{ $contact->relationship }}">

						<span class="relationship invalid-feedback" role="alert"></span>
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
					<div class="d-inline-block pos-relative">
						<span class="btn btn-danger">Remove</span>
						<span class="inline-notif hide"></span>
					</div>
				</div>
			</div>
		</form>
		
		<hr class="divider">
		@endforeach
	</div>
</div>