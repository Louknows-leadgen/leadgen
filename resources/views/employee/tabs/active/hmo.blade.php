<div class="row mt-3">
	<div class="col-md-12">
		<h5>Employee</h5>
		<form action="" method="post">
			<input type="hidden" value="{{ $employee->id }}" name="employee_id">
			
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label>Medilink ID</label>
						<div class="input-group">
							<input type="text" 
								   class="form-control form-control-sm" 
								   value="{{ isset($employee->medilink_id) ? $employee->medilink_id : '' }}"
								   name="medilink_id">
							<div class="input-group-append">
								<button class="btn btn-sm btn-primary" type="submit">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-10">
		<h5>Dependents</h5>
		<table class="table table-sm table-striped">
			<thead class="thead-dark">
				<tr>
					<th>Name</th>
					<th>Medilink ID</th>
				</tr>
			</thead>
			<tbody>
				<form class="hmo-form" action="{{ route('hmo.store',['id'=>$employee->id]) }}" method="post">
					<tr>
						<td>
							<input type="text" class="form-control form-control-sm border border-0" value="John Doe" readonly>
						</td>
						<td class="d-flex align-items-center">
							<input type="text" class="form-control form-control-sm border border-0 mr-2" value="1168016002500074" readonly>
							<span class="btn btn-danger badge">-</span>
						</td>
					</tr>

					<tr class="hide">
						<td>
							<input type="text" name="name" class="form-control form-control-sm" autocomplete="off">
						</td>
						<td class="d-flex align-items-center">
							<input type="text" name="medilink_number" class="form-control form-control-sm mr-2" autocomplete="off">
							<span class="btn btn-secondary badge hmo-cancel">-</span>
						</td>
					</tr>

					<tr class="table-success">
						<td class="text-right col-save" colspan="2">
							<span class="btn btn-success badge hmo-new">+</span>
							<button class='btn btn-success btn-sm hide'>Save</button>
						</td>
					</tr>
				</form>
			</tbody>
		</table>
	</div>	
</div>


