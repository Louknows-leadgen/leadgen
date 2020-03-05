<div class="row mt-3">
	<div class="col-md-12">
		<form>
			@csrf
			<div class="row">
				<div class="col-md-6 pr-5">
					
					<div class="form-group">
						<label>Company ID</label>
						<input type="text" class="form-control form-control-sm" placeholder="Generated upon submission" disabled>
					</div>

					<div class="form-group">
						<label>Cost Center</label>
						<select class="form-control form-control-sm">
							<option value="1">AGNT</option>
							<option value="2">FCL</option>
							<option value="3">IT</option>
						</select>
					</div>

					<div class="form-group">
						<label>Cluster</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm" data-modal="cluster">
							<div class="input-group-append">
								<span class="btn btn-primary" data-toggle="modal" data-target="#cluster-modal">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Site</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm">
							<div class="input-group-append">
								<span class="btn btn-primary" data-toggle="modal" data-target="#site-modal">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Position</label>
						<input type="text" class="form-control form-control-sm" readonly>
					</div>

					<div class="form-group">
						<label>Company</label>
						<select class="form-control form-control-sm">
							<option value="1">DCI</option>
							<option value="2">Leadgen</option>
						</select>
					</div>

					<div class="form-group">
						<label>Date Signed</label>
						<input type="text" class="form-control form-control-sm date">
					</div>

					<div class="form-group">
						<label>Contract Type</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm">
							<div class="input-group-append">
								<span class="btn btn-primary">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Department</label>
						<select class="form-control form-control-sm">
							<option value="1">Operations</option>
							<option value="2">IT</option>
						</select>
					</div>

					<div class="form-group">
						<label>Immediate Supervisor</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control form-control-sm">
							<div class="input-group-append">
								<span class="btn btn-primary">
									Browse
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>J.O date</label>
						<input type="text" class="form-control form-control-sm" readonly>
					</div>

				</div>


				<div class="col-md-6 pr-5">

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
@include('employee.modals.site_modal')