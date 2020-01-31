@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<h5>Candidate List</h5>
			<div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" id="search-candidate" data-user="{{$user_id}}" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="std-blue-bg text-white">
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
										<td><a class="link" href="{{ route('applications.profile',['applicant_id'=>$interview->applicant_id]) }}">Interview</a></td>
									</tr>
                            	@endforeach
                            @else
                                <tr>
                                    <td colspan="6">No results found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection