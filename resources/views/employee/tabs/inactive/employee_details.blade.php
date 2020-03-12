<div class="row mt-3">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 pr-5">
				
				<div class="form-group">
					<label>Employee Name</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->person->name() }}" disabled>
				</div>

				<div class="form-group">
					<label>Company ID</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->company_number }}" disabled>
				</div>

				<div class="form-group">
					<label>Cost Center</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->cost_name }}" disabled>
				</div>

				<div class="form-group">
					<label>Cluster</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->cluster_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Site</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->site_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Position</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->position_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Company</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->company_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Date Signed</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->date_signed }}" disabled>
				</div>

				<div class="form-group">
					<label>Contract Type</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->contract_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Department</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->department_name}}" disabled>
				</div>

				<div class="form-group">
					<label>Immediate Supervisor</label>
					<input type="text" class="form-control form-control-sm" value="{{ $employee->supervisor}}" disabled>
				</div>

			</div>


			<div class="col-md-6 pr-5">

				<div class="form-group">
					<label>J.O Date</label>
					<input type="text" 
						   class="form-control form-control-sm"
						   value="{{ isset($employee->jo_date) ? date('m/d/Y',strtotime($employee->jo_date)) : '' }}" 
						   readonly>
				</div>

				<div class="form-group">
					<label>Nesting Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->nesting_date }}" disabled>
				</div>

				<div class="form-group">
					<label>Training Extension Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->trng_ext_date }}" disabled>
				</div>

				<div class="form-group">
					<label>Evaluation Period</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->eval_period }}" disabled>
				</div>

				<div class="form-group">
					<label>Reprofile Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->reprofile_date }}" disabled>
				</div>

				<div class="form-group">
					<label>Start Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->start_date }}" disabled>
				</div>

				<div class="form-group">
					<label>Assoc. Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->assoc_date }}" disabled>
				</div>

				<div class="form-group">
					<label>Consultant Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->consultant_date }}" disabled>
				</div>

				<div class="form-group">
					<label>3rd Month Evaluation</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->month_eval3 }}" disabled>
				</div>

				<div class="form-group">
					<label>5th Month Evaluation</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->month_eval5 }}" disabled>
				</div>

				<div class="form-group">
					<label>Regularization Date</label>
					<input type="text" class="form-control form-control-sm date" value="{{ $employee->regularize_date }}" disabled>
				</div>

			</div>

		</div>
	</div>
</div>




<!-- Modals Here -->
@include('employee.modals.cluster_modal')
@include('employee.modals.contract_modal')
@include('employee.modals.supervisor_modal')