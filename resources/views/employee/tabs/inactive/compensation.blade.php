<div class="row mt-3">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 pr-5">
				<input type="hidden" value="{{ $employee->id }}" name="employee_id">
				<div class="form-group">
					<label>Basic Salary</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->basic_salary : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Meal Allowance</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->meal_allowance : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Transportation Allowance</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->transpo_allowance : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Communication Allowance</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->comm_allowance : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Rice Subsidy</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->rice_subsidy : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Night Differential</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->night_diff : '' }}"
					       disabled>
				</div>

			</div>

			<div class="col-md-6 pr-5">
				
				<div class="form-group">
					<label>Double Allowance</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->double_allowance : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Attendance Bonus</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->attendance_bonus : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>TOIC/QA Allowance</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->toic_qa_allowance : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Productivity Bonus</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->productivity_bonus : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Team Performance Bonus</label>
					<input type="number" 
					       class="form-control form-control-sm" 
					       value="{{ isset($compensation) ? $compensation->team_perf_bonus : '' }}"
					       disabled>
				</div>

			</div>

		</div>

	</div>
</div>


