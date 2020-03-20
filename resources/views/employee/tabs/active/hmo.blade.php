<div class="alert alert-danger alert-dismissible notif-box mt-3 d-none">
	<a href="#" class="close" aria-label="close">&times;</a>
	<ul class="list-unstyled"></ul> 
</div>



<div class="row mt-3">
	<div class="col-md-12">
		<h5>Employee</h5>
		<form action="{{ route('employees.update_hmo',['employee_id'=>$employee->id]) }}" 
			  method="put"
			  class="update_hmo">
			
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label>Medilink ID</label>
						<div class="input-group">
							<input type="text" 
								   class="form-control form-control-sm hmo_input" 
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
		<form class="hmo-form" action="{{ route('hmo.store',['id'=>$employee->id]) }}" method="post">
			<table class="table table-sm table-striped">
				<thead class="thead-dark">
					<tr>
						<th>Name</th>
						<th>Medilink ID</th>
					</tr>
				</thead>
				<tbody>
						@foreach($employee->health_insurances as $insurance)
						<tr>
							<td>
								<input type="text" class="form-control form-control-sm border border-0" value="{{ $insurance->name }}" readonly>
							</td>
							<td class="d-flex align-items-center">
								<input type="text" class="form-control form-control-sm border border-0 mr-2" value="{{ $insurance->hmo_id }}" readonly>
								<span class="btn btn-danger badge" data-id="{{ $insurance->id }}">
									-
								</span>
							</td>
						</tr>
						@endforeach

						<tr class="hide">
							<td>
								<input type="text" name="name" class="form-control form-control-sm hmo_input" autocomplete="off">
							</td>
							<td class="d-flex align-items-center">
								<input type="text" name="hmo_id" class="form-control form-control-sm mr-2 hmo_input" autocomplete="off">
								<span class="btn btn-secondary badge hmo-cancel">-</span>
							</td>
						</tr>

						<tr class="table-success">
							<td class="text-right col-save" colspan="2">
								<span class="btn btn-success badge hmo-new">+</span>
								<button class='btn btn-success btn-sm hide dependent_hmo_save'>Save</button>
							</td>
						</tr>
					
				</tbody>
			</table>
		</form>
	</div>	
</div>


