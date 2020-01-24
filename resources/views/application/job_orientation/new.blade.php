<div class="col-md-9 border-top border-left border-right border-bottom">
	<form class="store" action="/final_interviews" method="POST">
		@csrf
		<input type="hidden" name="applicant_id" value="{{$applicant->id}}">
		<div class="row">
			<div class="col-md-12">
				<h6 class="mt-3">Schedule Job Orientation</h6>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Schedule</label>
							<input type="text" name="jo_date" class="form-control form-control-sm datetime" placeholder="mm/dd/yyyy" autocomplete="off">
						</div>
					</div>
					<div class="col-md-4 d-flex align-items-end justify-content-center">
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Submit">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>	
</div>