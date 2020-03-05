<div class="row mt-3">
	<div class="col-md-12">
		<form>
			@csrf
			<div class="row">
				<div class="col-md-6 pr-5">
					
					<div class="form-group">
						<label>Applicant Name</label>
						<input type="text" class="form-control form-control-sm" value="{{ $applicant->person->name() }}" disabled>
					</div>

					<div class="form-group">
						<label>Company ID</label>
						<input type="text" class="form-control form-control-sm" placeholder="Generated upon submission" disabled>
					</div>

					<div class="form-group">
						<label>Cost Center</label>
						<select class="form-control form-control-sm">
							@foreach($cost_centers as $cost_center)
								<option value="{{ $cost_center->id }}">
									{{ $cost_center->cost_name }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Cluster</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" data-modal="cluster">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#cluster-modal">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Site</label>
						<select class="form-control form-control-sm">
							@foreach($sites as $site)
								<option value="{{ $site->id }}">{{ $site->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Position</label>
						<input type="text" class="form-control form-control-sm" value="{{ $applicant->job->name }}" readonly>
					</div>

					<div class="form-group">
						<label>Company</label>
						<select class="form-control form-control-sm">
							@foreach($companies as $company)
								<option value="{{ $company->id }}">{{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Date Signed</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Contract Type</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" data-modal="contract">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#contract-modal">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Department</label>
						<select class="form-control form-control-sm">
							@foreach($departments as $department)
								<option value="{{ $department->id }}">{{ $department->department_name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Immediate Supervisor</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" data-modal="supervisor">
							<div class="input-group-append">
								<span class="btn btn-primary custom-modal" data-toggle="modal" data-target="#supervisor-modal">
									Browse
								</span>
							</div>
						</div>
					</div>

				</div>


				<div class="col-md-6 pr-5">

					<div class="form-group">
						<label>J.O date</label>
						<input type="text" class="form-control form-control-sm" readonly>
					</div>

					<div class="form-group">
						<label>Nesting Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Training Extension Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Evaluation Period</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Reprofile Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Start Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Assoc. Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Consultant Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>3rd Month Evaluation</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>5th Month Evaluation</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Regularization Date</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

				</div>

			</div>

		</form>
	</div>
</div>




<!-- Modals Here -->
@include('employee.modals.cluster_modal')
@include('employee.modals.contract_modal')
@include('employee.modals.supervisor_modal')