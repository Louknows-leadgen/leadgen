@extends('layouts.main')

@section('contents')

@if(Session('success'))
    <div class="notif-process-top alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success! </strong>{{ Session('success') }}
    </div>
@endif

<div class="row">
	<div class="col-md-6">
		<h5>Filter search by:</h5>
		<div class="form-group">
			<label>Department</label>
			<select>
				<option>IT</option>
				<option>Operations</option>
				<option>QA</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box mb-5">

			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">Active</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">Inactive</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="row">
					<div class="mx-auto col-md-6">
						<h5 class="mt-4 mb-4">List of active employees</h5>
						<div class="input-group mb-3">
							<input type="text" id="search-input" class="form-control" placeholder="Search">
							<div class="input-group-append">
								<button id="search-employee" class="btn btn-success" type="submit">
									<span class="fa fa-search"></span>
								</button>
							</div>
						</div>
						<div class="jo-list">
							@include('employee.list._employees')
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
</div>

@endsection