@extends('layout.recruitment')

@section('title', 'Resources > Applicant')

@section('content')
	<div class="wrapper wp-mid">
		<div class="container">
			<div class="card">
				<h3 class="h3-normal">Resource Details</h3>
				<div class="info-table">
					<div class="info-nav">
						<div class="nav-tab active" data-tab="basic" data-id="{{ $person->id }}">Basic Info</div>
						<div class="nav-tab" data-tab="spouse" data-id="{{ $person->id }}">Spouses</div>
						<div class="nav-tab" data-tab="contact" data-id="{{ $person->id }}">Emergency Contacts</div>
						<div class="nav-tab" data-tab="dependent" data-id="{{ $person->id }}">Dependents</div>
						<div class="nav-tab" data-tab="education" data-id="{{ $person->id }}">Educations</div>
						<div class="nav-tab" data-tab="work" data-id="{{ $person->id }}">Work Experience</div>
					</div>
					<div class="info-content">
						@include('person.list')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection