<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InitialScreening extends Model
{
    //
    protected $fillable = [
    	'applicant_id',
    	'typing_score',
        'typing_result',
    	'comprehension_score',
    	'comprehension_result',
    	'init_interview_result',
    	'init_interview_remarks',
    	'overall_result'
    ];

    /*
    |------------------------
    |     Association
    |------------------------
    */

    public function test(){
    	return $this->belongsTo('App\Models\Test');
    }

    public function applicant(){
        return $this->belongsTo('App\Models\Applicant');
    }


    /*
    |------------------------
    |     Custom Attributes
    |------------------------
    */

    // used to create custom attribute specified inside the bracket
    protected $appends = ['test_name'];

    public function getTestNameAttribute(){
        return $this->test->name;
    }
}
