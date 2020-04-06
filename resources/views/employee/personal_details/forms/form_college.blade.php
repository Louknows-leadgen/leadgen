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