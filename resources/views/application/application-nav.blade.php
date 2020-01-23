<?php $class = ViewHelper::nav_class($applicant->application_status_id); ?>
<div class="process_nav">
	<div class="process_tab">
		<span class="{{$class['init']['title']}}">Initial Screening</span>
		<span class="tab_circle {{$class['init']['border']}}" data-id="{{$applicant->id}}" data-stat="1"><em class="fa fa-filter process-icon {{$class['init']['icon']}}"></em></span>
	</div>
	<div class="process_tab">
		<span class="{{$class['fin']['title']}}">Final Interview</span>
		<span class="tab_circle {{$class['fin']['border']}}" data-id="{{$applicant->id}}" data-stat="3"><em class="fa fa-phone process-icon {{$class['fin']['icon']}}"></em></span>
	</div>
	<div class="process_tab">
		<span class="{{$class['offer']['title']}}">Job Orientation</span>
		<span class="tab_circle {{$class['offer']['border']}}" data-id="{{$applicant->id}}" data-stat="6"><em class="fa fa-suitcase process-icon {{$class['offer']['icon']}}"></em></span>
	</div>
</div>