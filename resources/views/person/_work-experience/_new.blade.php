<div class="row mx-auto mb-4 p-4 item j_work-item" data-id="{{$idx}}">
	<span class="jc_remove fa fa-times-circle" title="Remove"></span>
	<div class="col-md-12">
		<div class="row">
			<div class="form-group col-md-3">
				<label class="req">Employer/Company:</label>
				<input type="text" name="work_exp[{{$idx}}][employer]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-3">
				<label class="req">Role:</label>
				<input type="text" name="work_exp[{{$idx}}][role_name]"  class="form-control form-control-sm validate">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-3">
				<label class="req">Start date:</label>
				<input type="text" name="work_exp[{{$idx}}][start_date]" class="form-control form-control-sm date validate" placeholder="mm/dd/yyyy" autocomplete="off">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
			<div class="form-group col-md-3">
				<label class="req">End date:</label>
				<input type="text" name="work_exp[{{$idx}}][end_date]" class="form-control form-control-sm date validate" placeholder="mm/dd/yyyy" autocomplete="off">
				<span class="invalid-feedback" role="alert">
				</span>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox mb-3">
			      <input type="checkbox" class="custom-control-input" id="work_exp[{{$idx}}][is_bpo]" name="work_exp[{{$idx}}][is_bpo]">
			      <label class="custom-control-label" for="work_exp[{{$idx}}][is_bpo]">BPO type of work?</label>
			    </div>
		    </div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
			  <label for="comment">Role description:</label>
			  <textarea class="form-control" rows="5" name="work_exp[{{$idx}}][role_desc]"></textarea>
			</div>
		</div>
	</div>
</div>