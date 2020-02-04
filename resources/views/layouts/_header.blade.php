<div class="row">
	<div class="col-md-12">
		<div class="header">
			<div class="logo">
		        <img src="{{ URL::asset('images/logo.svg') }}">
		    </div>
		    <div class="sign-in">
		    	Logged in as
				<span class="dropdown-toggle" data-toggle="dropdown">
					{{ Auth::user()->username }}
				</span>
				<div class="dropdown-menu user-menu">
		            @can('access',2)
					<a class="dropdown-item menu-item" href="{{ route('register') }}">Create user</a>
					@endcan

					<a class="link dropdown-item menu-item" 
					   href="#" 
					   onclick="event.preventDefault();
		                        document.getElementById('logout-form').submit();">
		               Sign out
		            </a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		            @csrf
		        </form>
				</div>
		    </div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="sub-header mb-4">
			<ul class="d-flex align-items-center">
		        @can('access',2)
		            <li class="list-inline-item mr-4" id="tab-resource">
		                <span>Resources</span>
		                <div class="drop-down">
		                    <a href="/">Applicants</a>
		                    <a href="#">Employees</a>
		                </div>
		            </li>
		            <li class="list-inline-item"><a href="#">Training Rooster</a></li>
		        @endcan
		        @can('access',3)
		            <li class="list-inline-item"><a href="/application/candidates">Candidates</a></li>
		        @endcan
		    </ul>
		</div>
	</div>
</div>