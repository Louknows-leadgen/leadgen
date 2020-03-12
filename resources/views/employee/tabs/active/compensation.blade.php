<div class="row mt-3">
	<div class="col-md-12">
		<form class="employee_forms"
			  data-form="compensation"
			  @if(isset($compensation))
				action="{{ route('compensations.update',['compensation'=>$compensation->id]) }}"
				method="PUT"
			  @else
			  	action="{{ route('compensations.store') }}"
			  	method="POST"
			  @endif
			  >
			<div class="row">
				<div class="col-md-6 pr-5">
					<input type="hidden" value="{{ $employee->id }}" name="employee_id">
					<div class="form-group">
						<label>Basic Salary</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->basic_salary : '' }}"
						       name="basic_salary">
					</div>

					<div class="form-group">
						<label>Meal Allowance</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->meal_allowance : '' }}"
						       name="meal_allowance">
					</div>

					<div class="form-group">
						<label>Transportation Allowance</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->transpo_allowance : '' }}"
						       name="transpo_allowance">
					</div>

					<div class="form-group">
						<label>Communication Allowance</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->comm_allowance : '' }}"
						       name="comm_allowance">
					</div>

					<div class="form-group">
						<label>Rice Subsidy</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->rice_subsidy : '' }}"
						       name="rice_subsidy">
					</div>

					<div class="form-group">
						<label>Night Differential</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->night_diff : '' }}"
						       name="night_diff">
					</div>

				</div>

				<div class="col-md-6 pr-5">
					
					<div class="form-group">
						<label>Double Allowance</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->double_allowance : '' }}"
						       name="double_allowance">
					</div>

					<div class="form-group">
						<label>Attendance Bonus</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->attendance_bonus : '' }}"
						       name="attendance_bonus">
					</div>

					<div class="form-group">
						<label>TOIC/QA Allowance</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->toic_qa_allowance : '' }}"
						       name="toic_qa_allowance">
					</div>

					<div class="form-group">
						<label>Productivity Bonus</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->productivity_bonus : '' }}"
						       name="productivity_bonus">
					</div>

					<div class="form-group">
						<label>Team Performance Bonus</label>
						<input type="number" 
						       class="form-control form-control-sm" 
						       value="{{ isset($compensation) ? $compensation->team_perf_bonus : '' }}"
						       name="team_perf_bonus">
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


