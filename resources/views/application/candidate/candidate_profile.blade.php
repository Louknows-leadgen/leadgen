@extends('layout.recruitment')

@section('title', 'Candidates')

@section('content')

<div class="content">
	<div class="container">
		<a class="back" data-for="new-applicant" href="/application/candidates">Back to applicant list</a>
		<div class="candidates">
				<div class="cand_info">
					<div class="card info">
						<h3>CANDIDATE BASIC INFO</h3>
						<div class="cand_basic_info">
								<label>First Name</label>
								<input type="text" name="" value="{{$info->first_name}}" disabled>
								<label>Last Name</label>
								<input type="text" name="" value="{{$info->last_name}}" disabled>
								<label>Gender</label>
								<input type="text" name="" value="{{$info->gender}}" data-for="cand-gender" disabled>
								<label>Age</label>
								<input type="number" value="{{$info->age}}" name="" data-for="cand-age" disabled>
						</div>
						
						<h3>EDUCATION</h3>
						<div class="cand_education">
								<h4>Elementary School</h4>
								<div class="cand_elem">
									<label>School Name</label>
									<input type="text" value="{{$elem->school_name}}" name="" disabled>
									<label>Year Graduated</label>
									<input type="text" value="{{$elem->graduated_date}}" name="yr" disabled>
								</div>
								<h4>High School</h4>
								<div class="cand_high">
									<label>School Name</label>
									<input type="text" value="{{$high->school_name}}" name="" disabled>
									<label>Year Graduated</label>
									<input type="text" value="{{$high->graduated_date}}" name="yr" disabled>
								</div>
								<h4>College/s</h4>
								<div class="colleges">
									@foreach($info->colleges as $college)
									<div class="cand_college">
										<label>School Name</label>
										<input type="text" name="" value="{{$college->school_name}}" disabled>
										<label>Year Graduated</label>
										<input type="text" name="yr" value="{{$college->graduated_date}}" disabled>
										<label>Degree</label>
										<input type="text" name="degree" value="{{$college->degree}}" disabled>
									</div>
									@endforeach
								</div>
						</div>
						
						<h3>WORK EXPERIENCE</h3>
						<div class="work_experiences">
							@foreach($info->work_experiences as $work)
							<div class="cand_work_exp">
								<label class="cand_employer_lbl">Employer</label>
								<input type="text" name="employer" value="{{$work->employer}}" disabled>
								<label class="cand_startdt_lbl">Start Date</label>
								<input type="text" name="startdt" value="{{date('m/d/Y', strtotime($work->start_date))}}" disabled>
								<label class="cand_role_lbl">Role</label>
								<input type="text" name="role" value="{{$work->role_name}}" disabled>
								<label class="cand_enddt_lbl">End Date</label>
								<input type="text" name="enddt" value="{{date('m/d/Y', strtotime($work->end_date))}}" disabled>
								<label class="cand_desc_lbl">Role Description</label>
								<textarea disabled>{{$work->role_desc}}</textarea>
							</div>
							@endforeach
						</div>
						
						<div class="bpo">
							<label>YEARS OF EXPERIENCE IN BPO INDUSTRY: </label>
							<input type="text" name="" value="60 months" disabled>
						</div>

						<h3>SKILLS</h3>
						<div class="cand_skills">
							<ul>
								<li>Microsoft Word Office</li>
								<li>Microsoft Excel Office</li>
								<li>Microsoft Outlook Office</li>
							</ul>
						</div>


						<div class="assessment">
							<h3>INTERVIEWER'S ASSESSMENT</h3>
							<form action="/final_interviews/{{$fin->id}}/update_result" method="POST">
								@csrf
								@method('PUT')
								<p>Assessment</p>
								<select name="result">
									<option value="Pass">Pass</option>
									<option value="Fail">Fail</option>
								</select>
								<p>Remarks</p>
								<textarea name="remarks"></textarea>
								<input type="submit" class="btn-confirm" name="submit" value="Submit">
							</form>
						</div>
					</div>
					<!-- end of card -->
					
				</div>
				<!-- end of cand_info -->
		</div>
	</div>
</div>

@endsection