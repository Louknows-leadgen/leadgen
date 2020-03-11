<div class="row mt-3">
	<div class="col-md-12">
		<form class="employee_forms"
			  data-form="government_detail"
			  @if(isset($gov_detail))
				action="{{ route('government_details.update',['government_detail'=>$gov_detail->id]) }}"
				method="PUT"
			  @else
			  	action="{{ route('government_details.store') }}"
			  	method="POST"
			  @endif
			  >
			<div class="row">
				<div class="col-md-6 pr-5">
					<input type="hidden" value="{{ $employee->id }}" name="employee_id">
					<div class="form-group">
						<label>SSS ID</label>
						<input type="text" 
						       class="form-control form-control-sm" 
						       value="{{ isset($gov_detail) ? $gov_detail->sss_no : '' }}"
						       name="sss_no">
					</div>

					<div class="form-group">
						<label>PAGIBIG ID</label>
						<input type="text" 
						       class="form-control form-control-sm" 
						       value="{{ isset($gov_detail) ? $gov_detail->hdmf_no : '' }}"
						       name="hdmf_no">
					</div>

					<div class="form-group">
						<label>Phil Health ID</label>
						<input type="text" 
						       class="form-control form-control-sm" 
						       value="{{ isset($gov_detail) ? $gov_detail->phic_no : '' }}"
						       name="phic_no">
					</div>

				</div>

				<div class="col-md-6 pr-5">
					
					<div class="form-group">
						<label>BIR ID</label>
						<input type="text" 
						       class="form-control form-control-sm" 
						       value="{{ isset($gov_detail) ? $gov_detail->tin_no : '' }}"
						       name="tin_no">
					</div>

					<div class="form-group">
						<label>Tax Code</label>
						<select class="form-control form-control-sm" name="tax_id">
								<option></option>
							@foreach($tax_codes as $tax_code)
								@if(isset($gov_detail))
									<option value="{{ $tax_code->id }}" 
										{{ $tax_code->id == $gov_detail->tax_id ? 'selected' : '' }}>
										{{ $tax_code->tax_name }}
									</option>
								@else
									<option value="{{ $tax_code->id }}">
										{{ $tax_code->tax_name }}
									</option>
								@endif
							@endforeach
						</select>
					</div>

				</div>

			</div>

			<div class="row mt-5 mb-2 pr-4">
				<div class="col-md-12">
					<button class="btn btn-primary btn-block btn-emp-submit">Update</button>
				</div>
			</div>

		</form>
	</div>
</div>


