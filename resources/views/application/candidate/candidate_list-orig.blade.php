@extends('layout.recruitment')

@section('title', 'Resources > Applicant')


@section('content')

<div class="content">
	<div class="container">
		<div class="candidates">
			<div class="card">
				<h3>Candidate List</h3>
				<div class="cta">
					<div class="search">
						<span>
							<input type="text" name="search" id="search-candidate" data-user="{{$user_id}}">
						</span>
					</div>
				</div>
				<div class="list">
					<table>
						<thead>
							<tr>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Applied For</th>
								<th>Schedule</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($interviews))
								@foreach($interviews as $interview)
								<tr>
									<td>
										{{$interview->applicant->person->first_name}}
									</td>
									<td>{{$interview->applicant->person->middle_name}}</td>
									<td>{{$interview->applicant->person->last_name}}</td>
									<td>{{$interview->applicant->job->name}}</td>
									<td>{{$interview->schedule}}</td>
									<td><a class="link" href="/application/candidate/{{$interview->applicant_id}}/profile">Interview</a></td>
								</tr>
								@endforeach
							@else
								<tr><td colspan="6">No results found</td></tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>

@endsection