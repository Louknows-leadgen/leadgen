@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')

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
								<th colspan="2">Action</th>
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
                                        <td>
                                            <a class="shadow-sm btn btn-outline-primary" href="{{ route('applications.profile',['applicant_id'=>$candidate->applicant_id]) }}">Interview</a>
                                        </td>
                                        <td>
                                            <a class="fin-no-show 
                                                      shadow-sm 
                                                      btn 
                                                      btn-outline-danger" 
                                                href="#" 
                                                onclick="event.preventDefault();
                                                         document.getElementById('{{ $candidate->applicant_id }}').submit();">
                                                No Show
                                            </a>

                                            <form id="{{$candidate->applicant_id}}"      
                                                  action="{{ route('fin.no_show',['id'=>$candidate->applicant_id]) }}" 
                                                  method="POST" 
                                                  style="display: none;">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </td>
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