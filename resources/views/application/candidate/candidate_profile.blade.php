@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')

<div class="container">
	<div class="row box mb-4">
		<div class="col-md-12">
			<h5 class="mb-4">CANDIDATE BASIC INFO</h5>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label>First name</label>
									<input type="text" class="form-control form-control-sm" value="{{$info->first_name}}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Last name</label>
									<input type="text" class="form-control form-control-sm" value="{{$info->last_name}}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Gender</label>
									<input type="text" class="form-control form-control-sm" value="{{$info->gender}}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Age</label>
									<input type="text" class="form-control form-control-sm" value="{{$info->age}}" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<h5 class="mt-5 mb-4">EDUCATION</h5>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h6><u>Elementary School</u></h6>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>School name</label>
											<input type="text" class="form-control form-control-sm" value="{{$elem->school_name}}" disabled>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Year graduated</label>
											<input type="text" class="form-control form-control-sm" value="{{$elem->graduated_date}}" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<h6><u>High School</u></h6>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>School name</label>
											<input type="text" class="form-control form-control-sm" value="{{$high->school_name}}" disabled>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Year graduated</label>
											<input type="text" class="form-control form-control-sm" value="{{$high->graduated_date}}" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<h6><u>College/s</u></h6>
						@if(count($info->colleges))
							@foreach($info->colleges as $college)
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-9">
												<div class="form-group">
													<label>School name</label>
													<input type="text" class="form-control form-control-sm" value="{{$college->school_name}}" disabled>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Year graduated</label>
													<input type="text" class="form-control form-control-sm" value="{{$college->graduated_date}}" disabled>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-9">
												<div class="form-group">
													<label>Degree</label>
													<input type="text" class="form-control form-control-sm" value="{{$college->degree}}" disabled>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach	
						@else
							<p>No colleges to display</p>
						@endif
					</div>
				</div>
			</div>

			<h5 class="mt-5 mb-4">WORK EXPERIENCE/S</h5>
			<div class="container">
				@if(count($info->work_experiences))
				@foreach($info->work_experiences as $work)
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label>Employer</label>
										<input type="text" class="form-control form-control-sm" value="{{$work->employer}}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Start Date</label>
										<input type="text" class="form-control form-control-sm" value="{{date('m/d/Y', strtotime($work->start_date))}}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label>Role</label>
										<input type="text" class="form-control form-control-sm" value="{{$work->role_name}}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>End Date</label>
										<input type="text" class="form-control form-control-sm" value="{{date('m/d/Y', strtotime($work->end_date))}}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label>Role Description</label>
										<textarea class="form-control" rows="5" disabled>{{$work->role_desc}}</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				@else
					<p>No work experiences to display</p>
				@endif
			</div>
		</div>

		<div class="col-md-12 mt-5">
			<h5>INTERVIEWER'S ASSESSMENT</h5>
			<form action="/final_interviews/{{$fin->id}}/update_result" method="post">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Assessment</label>
							<select name="result" class="custom-select custom-select-sm">
								<option value="Pass">Pass</option>
								<option value="Fail">Fail</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Remarks</label>
							<textarea name="remarks" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>

@endsection