@extends('layouts.main')

@section('contents')

	<div class="row">
		<div class="mx-auto col-md-6">

			<div class="sign-in">
		        <div>
		            <a class="text-primary" href="{{ URL::previous() }}">Back</a>
		        </div>
		    </div>
			
			<h5 class="mb-4">Hit profiles</h5>
				<ul class="list-group mb-2">
					@if(count($blacklists))
						@foreach($blacklists as $blacklist)
							<li class="list-group-item">
							  	<div class="row">
							  		<div class="col-md-2">
								  		<img src="{{ get_avatar($blacklist->gender) }}" width="100%" height="auto">
								  	</div>
							  		<div class="col-md-10">
							  			<h5 class="text-primary">{{ 
							  				full_name($blacklist->first_name,$blacklist->middle_name,$blacklist->last_name)
							  			 }}</h5>
							  			<table>
							  				<tr>
							  					<td class="pr-2">
							  						<span class="fa fa-birthday-cake"></span>
							  					</td>
							  					<td>
							  						{{date('m/d/Y', strtotime($blacklist->birthday))}}
							  					</td>
							  				</tr>
							  				<tr>
							  					<td class="pr-2">
							  						<span class="fa {{ $blacklist->gender == 'Male' ? 'fa-mars' : 'fa-venus' }}"></span>
							  					</td>
							  					<td>
							  						{{$blacklist->gender}}
							  					</td>
							  				</tr>
							  				<tr>
							  					<td class="pr-2">
							  						<span class="fa fa-map-marker"></span>
							  					</td>
							  					<td>
							  						{{$blacklist->city_address}}
							  					</td>
							  				</tr>
							  			</table>
							  			<div class="mt-3">
							  				<h6 class="text-secondary">Why am I blacklisted?</h6>
							  				<p>{{ $blacklist->reason }}</p>
							  			</div>
							  		</div>
							  	</div>
							</li>
						@endforeach
					@else
						<li class="list-group-item text-center">No hitlist found</li>
					@endif	
				</ul>
		</div>
	</div>

@endsection