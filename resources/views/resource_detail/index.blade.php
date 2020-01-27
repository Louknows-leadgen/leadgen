@extends('layouts.main')

@section('title', 'Resources > Applicant')

@section('contents')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="row box mb-5">
					<h5>Resource Details</h5>
					<div class="col-md-12">
						@include('resource_detail.nav')
					</div>
					<div class="col-md-12 border border-secondary">
						<div class="row">
							<div class="col-md-10 mx-auto">
								<div class="mt-4 grp">
									@include('resource_detail._basic_info.show')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection