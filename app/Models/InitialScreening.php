<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InitialScreening extends Model
{
    //
    protected $fillable = [
    	'applicant_id',
    	'test_id',
    	'test_score',
    	'test_result',
    	'init_interview_result',
    	'init_interview_remarks',
    	'overall_result'
    ];

    public function test(){
    	return $this->belongsTo('App\Models\Test');
    }

    public function applicant(){
        return $this->belongsTo('App\Models\Applicant');
    }
}
