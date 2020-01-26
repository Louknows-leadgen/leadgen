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
								@include('resource_detail._basic_info.index')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection