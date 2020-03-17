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
				<tr>
					<td>John Doe</td>
					<td class="d-flex align-items-center">
						<input type="text" class="form-control form-control-sm border border-0 mr-2" value="1168016002500074" readonly>
						<span class="btn btn-danger badge">-</span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" class="form-control form-control-sm">
					</td>
					<td>
						<input type="text" name="" class="form-control form-control-sm">
					</td>
				</tr>
				<tr class="table-success">
					<td class="text-right" colspan="2">
						<button class="btn btn-success btn-sm">Save</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>	
</div>


