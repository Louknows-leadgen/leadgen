@extends('layouts.main')

@section('title', 'Resources > Applicant')

@section('contents')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<div class="row box mb-5" style="min-width: 828px;">
					<h4 class="pt-4 pb-4">Resource Details</h4>

					<div class="sign-in">
			            <div>
			                <a class="text-primary" href="{{ URL::previous() }}">Back</a>
			            </div>
			        </div>
					
					<div class="col-md-12">
						@include('resource_detail.nav')
					</div>
					<div class="col-md-12 border border-secondary">
						<div class="row">
							<div class="col-md-10 mx-auto">
								<div class="mt-4">
									<div class="grp" data-tabcontent="basic">
										@include('resource_detail._basic_info.show')
									</div>
									<div class="grp d-none" data-tabcontent="spouse">
										@include('resource_detail._spouse.show')
									</div>
									<div class="grp d-none" data-tabcontent="contact">
										@include('resource_detail._emergency_contact.show')
									</div>
									<div class="grp d-none" data-tabcontent="dependent">
										@include('resource_detail._dependent.show')
									</div>
									<div class="grp d-none" data-tabcontent="education">
										@include('resource_detail._education.show')
									</div>
									<div class="grp d-none" data-tabcontent="work">
										@include('resource_detail._work.show')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection