<div class="col-md-3 nopadding">
	@php 
		$icon = get_status_icon($applicant->application_status_id) 
	@endphp
	<div class="p-3 
				text-center 
				process-tab
				{{ $icon['init'] }}
				@if(in_array($applicant->application_status_id, [1,2])) text-primary border-top border-bottom border-left actv @endif
				@if(!in_array($applicant->application_status_id, [1,2])) bg-secondary text-light @endif
				"
		 data-process="initial-screening" 
		 data-id="{{$applicant->id}}"
				>Initial Screening</div>

	<div class="p-3 
				text-center 
				process-tab  
				{{ $icon['fi'] }}
				@if(in_array($applicant->application_status_id, [3,4,5])) text-primary border-top border-bottom border-left actv @endif
				@if(!in_array($applicant->application_status_id, [3,4,5])) bg-secondary text-light @endif
				"
		 data-process="final-interview" 
		 data-id="{{$applicant->id}}"
				>Final Interview</div>

	<div class="p-3 
				text-center 
				process-tab 
				{{ $icon['jo'] }}    
				@if(in_array($applicant->application_status_id, [6,7,8,9,10])) text-primary border-top border-bottom border-left actv @endif
				@if(!in_array($applicant->application_status_id, [6,7,8,9,10])) bg-secondary text-light @endif
				"
		 data-process="job-orientation" 
		 data-id="{{$applicant->id}}"
				>Job Orientation</div>
</div>