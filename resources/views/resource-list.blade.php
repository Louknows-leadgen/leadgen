@extends('layouts.main')

@section('contents')

<div class="container">
	<div class="row">
		<!-- left -->
		<div class="col-md-3 d-none">
			<div class="card">
				
			</div>
		</div>
		<!-- end -->

		<!--right -->
		<div class="col-md-8">

			<!-- Passed applicants -->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header pl-4 text-primary">Passed Applicants</div>
						<div class="card-body p-0 pt-3">
							
							<div class="input-group w-50 ml-4 mb-3">
								<input type="text" class="form-control" placeholder="Search">
								<div class="input-group-append">
									<button class="btn btn-success" type="submit">
										<span class="fa fa-search"></span>
									</button>
								</div>
							</div>
							
							<table class="table table-hover table-sm mb-0">
								<thead>
									<tr class="border-top-0">
										<th class="border-top-0 pl-4 font-weight-bold">Name</th>
										<th class="border-top-0 pl-4 font-weight-bold">Applied for</th>
										<th class="border-top-0 pl-4 font-weight-bold">Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($resources))
										@foreach($resources as $resource)
											<tr>
												<td class="pl-4 align-middle"> 
													{{ $resource->person->name() }} 
												</td>
												<td class="pl-4 align-middle"> 
													{{ $resource->job->name }} 
												</td>
												<td class="pl-4 align-middle">
													<span class="btn btn-primary">Hire</span>
												</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td class="align-middle text-center" colspan="3">No results found</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
						<div class="card-footer">
							{{ $resources->links() }}
						</div>
					</div>
				</div>
			</div>
			<!-- end -->

		</div>
		<!-- end -->
	</div>
</div>
@endsection