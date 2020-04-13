@extends('layouts.main')


@section('contents')


<form action="{{ route('ext-clr.update',['id'=>$exit_clearance->id]) }}" method="post">
	@csrf
	@method('put')
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="box mb-5">
				<h5 class="mb-3">Employee Exit Clearance</h5>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Employee name:</label>
							<input type="text" class="form-control form-control-sm" value="{{ $exit_clearance->employee->full_name }}" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Position:</label>
							<input type="text" class="form-control form-control-sm" value="{{ $exit_clearance->employee->job_name }}" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Exit type:</label>
							<select class="custom-select custom-select-sm" name="exit_type_id" {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }} >
								@foreach($exit_types as $type)
									<option value="{{ $type->id }}"
										{{ 
											old('exit_type_id',$exit_clearance->exit_type_id) == $type->id ? 'selected' : '' 
										}}>
											{{ $type->name }}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last employment date:</label>
							<input type="text" 
							       class="form-control form-control-sm date @error('last_employment_dt') is-invalid @enderror" 
							       name="last_employment_dt" 
							       value="{{ old('last_employment_dt',$exit_clearance->last_employment_dt) }}" 
							       autocomplete="off"
							       {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>

							@error('last_employment_dt')
								<span class="invalid-feedback" 
									  role="alert">
									{{ $message }}
								</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Last payment amount:</label>
							<input type="number" 
							       class="form-control form-control-sm @error('last_pay_amt') is-invalid @enderror" 
							       name="last_pay_amt" 
							       value="{{ old('last_pay_amt',$exit_clearance->last_pay_amt) }}"
							       {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>

							@error('last_pay_amt')
								<span class="invalid-feedback" 
									  role="alert">
									{{ $message }}
								</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last payment date:</label>
							<input type="text" 
							       class="form-control form-control-sm date @error('last_pay_dt') is-invalid @enderror" 
							       name="last_pay_dt" 
							       value="{{ old('last_pay_dt',$exit_clearance->last_pay_dt) }}" 
							       autocomplete="off"
							       {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>

							@error('last_pay_dt')
								<span class="invalid-feedback" 
									  role="alert">
									{{ $message }}
								</span>
							@enderror
						</div>
					</div>
				</div>

				@if(isset($exit_clearance->claimed_dt))
				<div class="row my-2">
					<div class="col-md-6">
						<div class="form-group">
							<label>Payment claimed date:</label>
							<input type="text" class="form-control form-control-sm" value="{{ $exit_clearance->claimed_dt }}" readonly>
						</div>
					</div>
				</div>
				@endif

				<div class="row my-2">
					<div class="col-md-12">
						<div class="custom-control custom-switch">
							<input type="checkbox" 
							       class="custom-control-input" 
							       id="clear-switch" 
							       name="clear-switch"
								   {{ old('clear-switch',$exit_clearance->cleared_dt) !== null ? 'checked' : '' }}
								   {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>
							<label class="custom-control-label" for="clear-switch">Clearance signed?</label>
						</div>
					</div>
				</div>

				<div class="row clrdt-container minimized-y"
				@if(old('clear-switch',$exit_clearance->cleared_dt) !== null) style="height: 60px;" @endif>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" 
								   class="form-control form-control-sm date @error('cleared_dt') is-invalid @enderror" 
								   name="cleared_dt" 
								   value="{{old('cleared_dt',$exit_clearance->cleared_dt)}}" placeholder="Date cleared" 
								   autocomplete="off"
								   {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>

							@error('cleared_dt')
								<span class="invalid-feedback mb-3" 
									  role="alert">
									{{ $message }}
								</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Reason:</label>
							<textarea class="ckeditor" 
							          name="reason" 
							          id="reason"
							          {{ isset($exit_clearance->claimed_dt) ? 'disabled' : '' }}>{{ old('reason',$exit_clearance->reason) }}</textarea>
						</div>
					</div>
				</div>
				
				@if(!isset($exit_clearance->claimed_dt))
				<div class="row">
					<div class="col-md-12">
						<a href="{{ URL::previous() }}" class="btn btn-secondary mr-2">Cancel</a>
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</form>	
@endsection