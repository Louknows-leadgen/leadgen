@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')

<div class="row">
	<div class="col-md-10 mx-auto">
		
		<div class="box">
			<div class="row">
				<div class="col-md-12">
					<div class="sign-in">
				        <div>
				            <a class="text-primary" href="{{ URL::previous() }}">Back</a>
				        </div>
				    </div>
					
					<h5>Applicant's Info</h5>
					<div class="row d-flex justify-content-around">
						<div class="col-md-5">
							<div class="form-group">
								<label>Applicant's name</label>
								<input type="text" class="form-control form-control-sm" value="{{$interview->full_name}}" disabled>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Applied date</label>
								<input type="text" class="form-control form-control-sm" value="{{$interview->applicant_applied_date}}" disabled>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Applied for</label>
								<input type="text" class="form-control form-control-sm" value="{{$interview->applicant_applied_for}}" disabled>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Interviewer's assessment</label>
								<input type="text" class="form-control form-control-sm" value="{{$interview->result}}" disabled>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-12">				
					<h5>Interviewer's Remarks</h5>
					<div class="row d-flex justify-content-around">
						<div class="col-md-11">
							<textarea class="ckeditor" name="remarks" disabled>{{ $interview->remarks }}</textarea>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>

@endsection