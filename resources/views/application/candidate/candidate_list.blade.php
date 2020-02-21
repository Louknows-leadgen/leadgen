@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')


<div class="bg-notif">
    <div class="card w-25">
        <div class="card-header font-weight-bold">No Show</div>
        <div class="card-body">
            Tag this applicant as no show?
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <button class="btn btn-primary" data-page="candidate-list">Yes</button>
        </div>
    </div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="box">

            @if(Session('success'))
                <div class="notif-process alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success! </strong>{{ Session('success') }}
                </div>
            @endif

            @if(Session('error'))
                <div class="notif-process alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error! </strong>{{ Session('error') }}
                </div>
            @endif

            <div class="sign-in">
                <div>
                    <a class="text-primary" href="{{ route('history.index') }}">Go to history</a>
                </div>
            </div>

			<h5>Candidate List</h5>
			<div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" id="search-candidate" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 candidate-list">
                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr class="std-blue-bg text-white">
                                <th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Applied For</th>
								<th>Schedule</th>
								<th colspan="2">Action</th>
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
										<td>
                                            <a class="shadow-sm btn btn-outline-primary" href="{{ route('applications.profile',['applicant_id'=>$interview->applicant_id]) }}">Interview</a>
                                        </td>
                                        <td>     
                                            <span data-id="{{ $interview->applicant_id }}" 
                                                  class="btn 
                                                         btn-outline-danger
                                                         shadow-sm 
                                                         remove-trigger">
                                              No show
                                            </span>
                                        </td>
									</tr>
                            	@endforeach
                            @else
                                <tr>
                                    <td colspan="6">No results found. Visit <a href="{{ route('history.index') }} ">Interview history</a>.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! $interviews->links() !!}
                </div>
            </div>
		</div>
	</div>
</div>

@endsection