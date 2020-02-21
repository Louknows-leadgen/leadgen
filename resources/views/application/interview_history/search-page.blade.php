@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')
<div class="bg-notif">
    <div class="card w-25">
        <div class="card-header font-weight-bold">Remove Interview</div>
        <div class="card-body">
            Are you sure you want to remove this interview?
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-secondary mr-3">No</button>
            <button class="btn btn-primary" data-page="interview-history">Yes</button>
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

            <div class="sign-in">
                <div>
                    <a class="text-primary" href="{{ route('applications.candidates') }}">Go to candidates</a>
                </div>
            </div>

			<h5>Interview History</h5>
			<div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" id="search-interview" class="form-control" placeholder="Search" value="{{ $skey }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 interview-list">
                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr class="thead-dark">
                                <th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Applied For</th>
                                <th>Applied Date</th>
                                <th>Assessment</th>
								<th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($interviews))
								@foreach($interviews as $interview)
	                                <tr>
										<td>
											{{$interview->applicant_first_name}}
										</td>
										<td>
                                            {{$interview->applicant_middle_name}}
                                        </td>
										<td>
                                            {{$interview->applicant_last_name}}
                                        </td>
										<td>
                                            {{$interview->applicant_applied_for}}
                                        </td>
                                        <td>{{date('m/d/Y', strtotime($interview->applicant_applied_date))}}</td>
                                        <td>{{$interview->result}}</td>
										<td>
                                            <a class="shadow-sm btn btn-outline-secondary" 
                                               href="{{ route('history.show',['history'=>$interview->id]) }}">
                                                View result
                                            </a>
                                        </td>
                                        <td>
                                            <span class="shadow-sm btn btn-outline-danger remove-trigger" data-id="{{ $interview->id }}">Remove</span>
                                        </td>
									</tr>
                            	@endforeach
                            @else
                                <tr>
                                    <td colspan="6">No results found. Visit <a href="{{ route('applications.candidates') }}">Candidate list</a>.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! $interviews->appends(['skey'=>$skey])->links() !!}
                </div>
            </div>
		</div>
	</div>
</div>

@endsection