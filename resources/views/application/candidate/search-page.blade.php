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
                        <input type="text" id="search-candidate" class="form-control" placeholder="Search" value="{{ $skey }}">
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
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($candidates))
                                @foreach($candidates as $candidate)
                                    <tr>
                                        <td>
                                            {{$candidate->first_name}}
                                        </td>
                                        <td>{{$candidate->middle_name}}</td>
                                        <td>{{$candidate->last_name}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{date('m/d/Y g:i A', strtotime($candidate->schedule))}}</td>
                                        <td><a class="link" href="{{ route('applications.profile',['applicant_id'=>$candidate->applicant_id]) }}">Interview</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No results found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! $candidates->appends(['skey'=>$skey])->links() !!}
                </div>
            </div>
		</div>
	</div>
</div>

@endsection