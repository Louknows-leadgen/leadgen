<?php

function get_status_icon($status_id){
	$tab = [];

	switch ($status_id) {
		case 1:
			$tab['init'] = 'current';
			$tab['fi'] = '';
			$tab['jo'] = '';
			break;
		case 2:
			$tab['init'] = 'fail';
			$tab['fi'] = '';
			$tab['jo'] = '';
			break;
		case 3:
		case 4:
			$tab['init'] = 'completed';
			$tab['fi'] = 'current';
			$tab['jo'] = '';
			break;
		case 5:
			$tab['init'] = 'completed';
			$tab['fi'] = 'fail';
			$tab['jo'] = '';
			break;
		case 6:
		case 7:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'current';
			break;
		case 8:
		case 10:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'fail';
			break;
		case 9:
			$tab['init'] = 'completed';
			$tab['fi'] = 'completed';
			$tab['jo'] = 'completed';
			break;						
	}

	return $tab;
}