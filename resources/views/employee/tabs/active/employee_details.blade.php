<div class="row mt-3">
	<div class="col-md-12">
		<form class="update_employee" action="{{ route('employees.update',['employee'=>$employee->id]) }}">
			<div class="row">
				<div class="col-md-6 pr-5">
					
					<div class="form-group">
						<label>Employee Name</label>
						<input type="text" id="person_id" class="form-control form-control-sm" value="{{ $employee->person->name() }}" data-id="{{ $employee->id }}" disabled>
					</div>

					<div class="form-group">
						<label>Company ID</label>
						<input type="text" class="form-control form-control-sm" value="{{ $employee->company_number }}" disabled>
					</div>

					<div class="form-group">
						<label>Cost Center</label>
						<select class="form-control form-control-sm" name="cost_center_id">
							@foreach($cost_centers as $cost_center)
								<option value="{{ $cost_center->id }}" 
									{{ $cost_center->id == $employee->cost_center_id ? 'selected' : '' }}>
									{{ $cost_center->cost_name }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Cluster</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" name="cluster_name" id="cluster_name" data-modal="cluster" value="{{ isset($employee->cluster) ? $employee->cluster->cluster_name : '' }}">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#cluster-modal">
									Browse
								</span>
							</div>
							<span class="invalid-feedback cluster_name" role="alert">
							</span>
						</div>
					</div>

					<div class="form-group">
						<label>Site</label>
						<select class="form-control form-control-sm" name="site_id">
							@foreach($sites as $site)
								<option value="{{ $site->id }}"
									{{ $site->id == $employee->site_id ? 'selected' : '' }}>
									{{ $site->name }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Department</label>
						<input type="text" class="form-control form-control-sm" value="{{ $employee->department_name }}" id="department_name" readonly>
						<input type="hidden" name="department_id" id="department_id" value="{{ $employee->job->department->id }}">
					</div>

					<div class="form-group">
						<label>Position</label>
						<select class="form-control form-control-sm" name="job_id" id="position">

							@foreach($departments as $department)
								<optgroup label="{{ $department->department_name }}">
									@foreach($department->positions as $position)
										<option value="{{ $position->id }}"
											{{ $position->id == $employee->job_id ? 'selected' : '' }}>
											{{ $position->name }}
										</option>
									@endforeach
								</optgroup>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Company</label>
						<select class="form-control form-control-sm" name="company_id">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" 
									{{ $company->id == $employee->company_id ? 'selected' : '' }}>
									{{ $company->company_name }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Date Signed</label>
						<input type="text" class="form-control form-control-sm date" name="date_signed" id="date_signed" autocomplete="off" value="{{ isset($employee->date_signed) ? $employee->date_signed : '' }}">
						<span class="invalid-feedback date_signed" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Contract Type</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" name="contract_name" id="contract_name" data-modal="contract" value="{{ isset($employee->contract) ? $employee->contract->contract_name : '' }}">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#contract-modal">
									Browse
								</span>
							</div>
							<span class="invalid-feedback contract_name" role="alert">
							</span>
						</div>
					</div>

					<div class="form-group">
						<label>Immediate Supervisor</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" name="supervisor" id="supervisor" data-modal="supervisor" value="{{ isset($employee->employee) ? $employee->employee->person->name() : '' }}">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#supervisor-modal">
									Browse
								</span>
							</div>
							<span class="invalid-feedback supervisor" role="alert">
							</span>
						</div>
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
						<input type="text" class="form-control form-control-sm date" name="nesting_date" id="nesting_date" autocomplete="off" value="{{ isset($employee->nesting_date) ? date('m/d/Y',strtotime($employee->nesting_date)) : '' }}">
						<span class="invalid-feedback nesting_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Training Extension Date</label>
						<input type="text" class="form-control form-control-sm date" name="trng_ext_date" id="trng_ext_date" autocomplete="off" value="{{ isset($employee->trng_ext_date) ? date('m/d/Y',strtotime($employee->trng_ext_date)) : '' }}">
						<span class="invalid-feedback trng_ext_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Evaluation Period</label>
						<input type="text" class="form-control form-control-sm date" name="eval_period" id="eval_period" autocomplete="off" value="{{ isset($employee->eval_period) ? date('m/d/Y',strtotime($employee->eval_period)) : '' }}">
						<span class="invalid-feedback eval_period" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Reprofile Date</label>
						<input type="text" class="form-control form-control-sm date" name="reprofile_date" id="reprofile_date" autocomplete="off" value="{{ isset($employee->reprofile_date) ? date('m/d/Y',strtotime($employee->reprofile_date)) : '' }}">
						<span class="invalid-feedback reprofile_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Start Date</label>
						<input type="text" class="form-control form-control-sm date" name="start_date" id="start_date" autocomplete="off" value="{{ isset($employee->start_date) ? date('m/d/Y',strtotime($employee->start_date)) : '' }}">
						<span class="invalid-feedback start_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Assoc. Date</label>
						<input type="text" class="form-control form-control-sm date" name="assoc_date" id="assoc_date" autocomplete="off" value="{{ isset($employee->assoc_date) ? date('m/d/Y',strtotime($employee->assoc_date)) : '' }}">
						<span class="invalid-feedback assoc_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Consultant Date</label>
						<input type="text" class="form-control form-control-sm date" name="consultant_date" id="consultant_date" autocomplete="off" value="{{ isset($employee->consultant_date) ? date('m/d/Y',strtotime($employee->consultant_date)) : '' }}">
						<span class="invalid-feedback consultant_date" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>3rd Month Evaluation</label>
						<input type="text" class="form-control form-control-sm date" name="month_eval3" id="month_eval3" autocomplete="off" value="{{ isset($employee->month_eval3) ? date('m/d/Y',strtotime($employee->month_eval3)) : '' }}">
						<span class="invalid-feedback month_eval3" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>5th Month Evaluation</label>
						<input type="text" class="form-control form-control-sm date" name="month_eval5" id="month_eval5" autocomplete="off" value="{{ isset($employee->month_eval5) ? date('m/d/Y',strtotime($employee->month_eval5)) : '' }}">
						<span class="invalid-feedback month_eval5" role="alert">
						</span>
					</div>

					<div class="form-group">
						<label>Regularization Date</label>
						<input type="text" class="form-control form-control-sm date" name="regularize_date" id="regularize_date" autocomplete="off" value="{{ isset($employee->regularize_date) ? date('m/d/Y',strtotime($employee->regularize_date)) : '' }}">
						<span class="invalid-feedback regularize_date" role="alert">
						</span>
					</div>

				</div>

			</div>

			<div class="row mt-5 mb-2 pr-4">
				<div class="col-md-12">
					<button class="btn btn-primary btn-block btn-emp-submit">Update</button>
				</div>
			</div>

		</form>
	</div>
</div>




<!-- Modals Here -->
@include('employee.modals.cluster_modal')
@include('employee.modals.contract_modal')
@include('employee.modals.supervisor_modal')