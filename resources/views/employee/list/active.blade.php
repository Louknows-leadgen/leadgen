@extends('layouts.main')

@section('contents')

@if(Session('success'))
    <div class="notif-process-top alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success! </strong>{{ Session('success') }}
    </div>
@endif

<div class="row">
	<div class="col-md-10 mx-auto">
		<div class="box mb-5">

			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="#active-employees">Active</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('employees.inactive') }}">Inactive</a>
				</li>
			</ul>

			<div class="tab-content" id="active-employees">
				<div class="row">
					<div class="col-md-2">
						<div class="ml-3 mt-4">
							<h6>Filter results by:</h6>
							<div class="form-group">
								<label>Department</label>
								<select class="form-control form-control-sm" 
										id="filter-by-department">
									<option value="0">All</option>
									@foreach($departments as $department)
										<option value="{{ $department->id }}">
											{{ $department->department_name }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="mx-auto col-md-6">
						<h5 class="mt-4 mb-4">List of active employees</h5>
						<div class="input-group mb-3">
							<input type="text" 
								   id="search-employee" 
								   class="form-control"
								   data-scope="active"
								   placeholder="Search">
							<div class="input-group-append">
								<button id="search-employee-btn" class="btn btn-success" type="submit">
									<span class="fa fa-search"></span>
								</button>
							</div>
						</div>
						<div class="employee-list">
							@include('employee.list._employees')
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
</div>

@endsection