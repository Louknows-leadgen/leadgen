@extends('layouts.main')

@section('title','Account')


@section('contents')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 mr-5">
				<ul class="list-group account">
					<li class="list-group-item mb-2 actv-acnt-opt acnt-tab"
						data-tab="personal-info">
						<span class="fa fa-vcard-o mr-2 icon"></span>
						<span class="title">Personal info</span>
					</li>
					<li class="list-group-item acnt-tab"
						data-tab="change-password">
						<span class="fa fa-key mr-2 icon"></span>
						<span class="title">Change password</span>
					</li>
				</ul>
			</div>
			<div class="col-md-8">

				@include('user._personal-info')
				@include('user._change-password')

			</div>
		</div>
	</div>


@endsection