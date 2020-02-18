@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<h5>Interview History</h5>
			<div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" id="search-interview" class="form-control" placeholder="Search">
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
								<th>Action</th>
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
										<td>
                                            <a class="btn btn-info" 
                                               href="{{ route('history.show',['history'=>$interview->id]) }}">
                                                View result
                                            </a>
                                            <span class="btn btn-danger remove-interview" data-id="{{ $interview->id }}">Remove</span>
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
                    {!! $interviews->links() !!}
                </div>
            </div>
		</div>
	</div>
</div>

@endsection