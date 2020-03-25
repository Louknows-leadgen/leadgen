@extends('layouts.main')


@section('contents')
<form action="{{ route('ext-clr.store') }}" method="post">
	@csrf
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="box">
				<h5 class="mb-3">Create Exit Clearance</h5>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Employee name:</label>
							<input type="text" class="form-control form-control-sm" value="{{ $employee->full_name }}" readonly>
							<input type="hidden" name="employee_id" class="form-control form-control-sm" value="{{ $employee->id }}" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Position:</label>
							<input type="text" class="form-control form-control-sm" value="{{ $employee->job_name }}" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Exit type:</label>
							<select class="custom-select custom-select-sm" name="ext_type">
								@foreach($exit_types as $type)
									<option value="{{ $type->id }}"
										{{ 
											old('ext_type') == $type->id ? 'selected' : '' 
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
							<input type="text" class="form-control form-control-sm date @error('last_employment_dt') is-invalid @enderror" name="last_employment_dt" value="{{ old('last_employment_dt') }}" autocomplete="off">

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
							<input type="number" class="form-control form-control-sm @error('last_pay_amt') is-invalid @enderror" name="last_pay_amt" value="{{ old('last_pay_amt') }}">

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
							<input type="text" class="form-control form-control-sm date @error('last_pay_dt') is-invalid @enderror" name="last_pay_dt" value="{{ old('last_pay_dt') }}" autocomplete="off">

							@error('last_pay_dt')
								<span class="invalid-feedback" 
									  role="alert">
									{{ $message }}
								</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-12">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="clear-switch" name="clear-switch"
							{{ old('clear-switch') !== null ? 'checked' : '' }}>
							<label class="custom-control-label" for="clear-switch">Clearance signed?</label>
						</div>
					</div>
				</div>
				<div class="row clrdt-container minimized-y"
				@if(old('clear-switch') !== null) style="height: 60px;" @endif>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm date @error('cleared_dt') is-invalid @enderror" name="cleared_dt" value="{{old('cleared_dt')}}" placeholder="Date cleared" autocomplete="off">

							@error('cleared_dt')
								<span class="invalid-feedback" 
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
							<textarea class="ckeditor" name="reason" id="reason">{{ old('reason') }}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>	
@endsection