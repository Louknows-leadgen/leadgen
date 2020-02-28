<?php

function get_status_icon($status_id){
	$tab = [];

	switch ($status_id) {
		// applicant is in initial screening
		case 1:
			$tab['init'] = 'current';
			$tab['fi'] = '';
			$tab['jo'] = '';
			break;
		// applicant failed in initial screening	
		case 2:
			$tab['init'] = 'fail';
			$tab['fi'] = '';
			$tab['jo'] = '';
			break;
		// applicant passed initial screening. Proceed to final interview	
		case 3:
		case 4:
			$tab['init'] = 'completed';
			$tab['fi'] = 'current';
			$tab['jo'] = '';
			break;
		// applicant failed/no show in final interview
		case 11:	
		case 5:
			$tab['init'] = 'completed';
			$tab['fi'] = 'fail';
			$tab['jo'] = '';
			break;
		// applicant passed the final interview.	
		case 6:
		case 7:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'current';
			break;
		// applicant no show/declined offer in job orientation	
		case 8:
		case 10:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'fail';
			break;
		// applicant is hired	
		case 9:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'completed';
			break;						
	}

	return $tab;
}

function get_avatar($gender){
	switch ($gender) {
        case 'Male':
            return asset('images/man.svg');
            break;
        
        case 'Female':
            return asset('images/woman.svg');
            break;
    }
}

function full_name($fn,$mn,$ln){
	return implode(' ', [$fn,$mn,$ln]);
}