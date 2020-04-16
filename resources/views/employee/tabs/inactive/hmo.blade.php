

<div class="row mt-3">
	<div class="col-md-12">
		<h5>Employee</h5>
		<form>
			
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label>Medilink ID</label>
						<div class="input-group">
							<input type="text" 
								   class="form-control form-control-sm hmo_input" 
								   value="{{ isset($employee->medilink_id) ? $employee->medilink_id : '' }}"
								   name="medilink_id" disabled>
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
						<tr data-id="{{$insurance->id}}">
							<td>
								<input type="text" class="form-control form-control-sm border border-0" value="{{ $insurance->name }}" readonly>
							</td>
							<td class="d-flex align-items-center">
								<input type="text" class="form-control form-control-sm border border-0 mr-2" value="{{ $insurance->hmo_id }}" readonly>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
		</form>
	</div>	
</div>


