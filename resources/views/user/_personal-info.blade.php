<div class="card acnt-tabcontent personal-info">
	<div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div><h5>Personal Info</h5></div>
            </div>  
        </div>
    </div>
    <div class="card-body">
    	<div class="row">
    		<div class="col-md-12">
    			<table class="display-info">
    				<tr>
    					<td><strong>Username</strong></td>
    					<td>{{$user->username}}</td>
    				</tr>
    				<tr>
    					<td><strong>First name</strong></td>
    					<td>{{$user->first_name}}</td>
    				</tr>
    				<tr>
    					<td><strong>Last name</strong></td>
    					<td>{{$user->last_name}}</td>
    				</tr>
    				<tr>
    					<td><strong>Role</strong></td>
    					<td>{{$user->role_name}}</td>
    				</tr>
    				<tr>
    					<td><strong>Email</strong></td>
    					<td class="email-show" style="position: relative;">
    						<span class="email-val">
    							{{ $user->email }}
    						</span>
    						
    						<span class="fa fa-edit edit-email"></span>
    					</td>
    					<td class="email-form d-none">
    						<form class="d-flex" 
    							  action="{{ route('user.update-email') }}" 
    							  method="post">
								
								<input class="input-underline" 
									   type="email" 
									   name="email" 
									   value="{{ $user->email }}">
								
								<span class="cncl-email-update 
											 btn btn-secondary">
									Cancel
								</span>
								
								<input type="submit" 
									   class="btn btn-primary ml-3" 
									   name="update" 
									   value="Update">
							</form>
    					</td>
    				</tr>
    			</table>
    		</div>
    	</div>
    </div>
</div>