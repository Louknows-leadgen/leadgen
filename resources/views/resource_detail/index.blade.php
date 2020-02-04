@extends('layouts.main')

@section('title', 'Resources > Applicant')

@section('contents')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="row box mb-5">
					<h4 class="pt-4 pb-4">Resource Details</h4>

					<div class="sign-in">
			            <div>
			                <a href="{{ URL::previous() }}"><< Back</a>
			            </div>
			        </div>
					
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