@extends('layouts.main')

@section('contents')
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="box">
				<h5>Exit Clearance List</h5>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<td>Name</td>
							<td>Position</td>
							<td>Last Payment Date</td>
							<td>Last Payment (PHP)</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($exit_clearances as $clearance)
							<tr>
								<td>
									<a href="{{ route('ext-clr.show',['id'=>$clearance->id]) }}">
										{{ $clearance->employee->full_name }}
									</a>
								</td>
								<td>{{ $clearance->employee->job_name }}</td>
								<td >{{ 
									isset($clearance->last_pay_dt) ? 
									date('m/d/Y', strtotime($clearance->cleared_dt)) : 
									'-,-'
								}}</td>
								<td>{{ number_format($clearance->last_pay_amt) }}</td>
								<td>
									<button class="btn btn-primary claim-last-pay"
									        data-id="{{ $clearance->id }}">
									    Claim
									</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection