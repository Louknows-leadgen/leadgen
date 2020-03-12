<div class="row mt-3">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 pr-5">
				<div class="form-group">
					<label>SSS ID</label>
					<input type="text" 
					       class="form-control form-control-sm" 
					       value="{{ isset($gov_detail) ? $gov_detail->sss_no : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>PAGIBIG ID</label>
					<input type="text" 
					       class="form-control form-control-sm" 
					       value="{{ isset($gov_detail) ? $gov_detail->hdmf_no : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Phil Health ID</label>
					<input type="text" 
					       class="form-control form-control-sm" 
					       value="{{ isset($gov_detail) ? $gov_detail->phic_no : '' }}"
					       disabled>
				</div>

			</div>

			<div class="col-md-6 pr-5">
				
				<div class="form-group">
					<label>BIR ID</label>
					<input type="text" 
					       class="form-control form-control-sm" 
					       value="{{ isset($gov_detail) ? $gov_detail->tin_no : '' }}"
					       disabled>
				</div>

				<div class="form-group">
					<label>Tax Code</label>
					<input type="text" 
					       class="form-control form-control-sm" 
					       value="{{ isset($gov_detail) ? $gov_detail->tax->tax_name : '' }}"
					       disabled>
				</div>

			</div>

		</div>
	</div>
</div>


