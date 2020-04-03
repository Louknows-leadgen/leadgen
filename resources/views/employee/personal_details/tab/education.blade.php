<div class="row mt-3">
	<div class="col-md-12">
		<form class="employee-det-form" action="{{ route('employees.update_school') }}" method='put'>
			<h5>Elementary</h5>			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $elem->school_name }}">
						<input type="hidden" name="school_id" value="{{ $elem->id }}">
						
						<span class="school_name invalid-feedback" role="alert"></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm" value="{{ $elem->graduated_date }}">

						<span class="graduated_date invalid-feedback" role="alert"></span>
					</div>					
				</div>

				<div class="col-md-3">
						<div class="form-group">
							<label>&nbsp;</label>
							<button class="btn btn-sm btn-primary d-block">Update</button>
						</div>
						<span class="inline-notif hide"></span>
					</div>
			</div>
		</form>	

		<hr>

		<form class="employee-det-form" action="{{ route('employees.update_school') }}" method='put'>
			<h5>High School</h5>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $high->school_name }}">
						<input type="hidden" name="school_id" value="{{ $high->id }}">

						<span class="school_name invalid-feedback" role="alert"></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm" value="{{ $high->graduated_date }}">

						<span class="graduated_date invalid-feedback" role="alert"></span>
					</div>					
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>&nbsp;</label>
						<button class="btn btn-sm btn-primary d-block">Update</button>
					</div>
					<span class="inline-notif hide"></span>			
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
		<form class="employee-det-form" action="{{ route('employees.update_college') }}" method='put'>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>School name</label>
						<input type="text" name="school_name" class="form-control form-control-sm" value="{{ $college->school_name }}">
						<input type="hidden" name="college_id" value="{{ $college->id }}">

						<span class="school_name invalid-feedback" role="alert"></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Year graduated</label>
						<input type="text" name="graduated_date" class="form-control form-control-sm" value="{{ $college->graduated_date }}">

						<span class="graduated_date invalid-feedback" role="alert"></span>
					</div>					
				</div>

				<div class="col-md-9">
					<div class="form-group">
						<label>Degree</label>
						<input type="text" name="degree" class="form-control form-control-sm" value="{{ $college->degree }}">

						<span class="degree invalid-feedback" role="alert"></span>
					</div>
				</div>

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