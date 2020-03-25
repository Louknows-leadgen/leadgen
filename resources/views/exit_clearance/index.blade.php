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
							<td>Date Cleared</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($exit_clearances as $clearance)
							<tr>
								<td>{{ $clearance->employee->full_name }}</td>
								<td>{{ $clearance->employee->job_name }}</td>
								<td >{{ 
									isset($clearance->cleared_dt) ? $clearance->cleared_dt : '-,-'
								}}</td>
								<td></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection