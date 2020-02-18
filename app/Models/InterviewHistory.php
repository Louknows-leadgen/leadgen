<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewHistory extends Model
{
	//
	protected $fillable = [
		'interviewer_id',
		'applicant_first_name',
		'applicant_middle_name',
		'applicant_last_name',
		'applicant_applied_for',
		'result',
		'remarks'
	];

    //
    public function user(){
        return $this->belongsTo('App\Models\User','interviewer_id');
    }
}
