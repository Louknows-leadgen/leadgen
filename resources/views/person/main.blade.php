@extends('layouts.main')

@section('contents')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row content">
					<div class="col-md-12">
						<form class="row" action="/persons" method="POST">
							@csrf
							@include('person._personal-detail._personal-detail')
							@include('person._spouse.spouse')
							@include('person._emergency-contact.emergency-contact')
							@include('person._dependent.dependent')
							@include('person._education.education')
							@include('person._work-experience.work-experience')

							<input type="submit" class="btn btn-success btn-block btn-lg mb-4" value="Submit">

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection