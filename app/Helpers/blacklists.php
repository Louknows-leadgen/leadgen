<?php

use App\Models\Blacklist;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;


function get_profile($applicant_id){
	$applicant = Applicant::find($applicant_id);
	$person['first_name'] = $applicant->person->first_name;
	$person['middle_name'] = $applicant->person->middle_name;
	$person['last_name'] = $applicant->person->last_name;
	$person['birthday'] = $applicant->person->birthday;
	$person['gender'] = $applicant->person->gender;

	return $person;
}


function hit_profiles($applicant_id){
    $person = get_profile($applicant_id);

    $blacklists = DB::table('blacklists')
                  ->where('first_name','=',$person['first_name'])
                  ->where(function($q) use($person){
                        $q->where('middle_name','=',$person['middle_name'])
                          ->orWhereRaw("? is null",[$person['middle_name']]);
                    })
                  ->where('last_name','=',$person['last_name'])
                  ->where('gender','=',$person['gender'])
                  ->whereDate('birthday',$person['birthday'])
                  ->get();

    return $blacklists;
}


function hit_count($applicant_id){
    $hit_count = hit_profiles($applicant_id);

    return $hit_count->count();
}