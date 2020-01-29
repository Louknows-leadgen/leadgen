<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Applicant extends Model
{
	protected $fillable = [
    	'job_id',
    	'applied_site',
    	'referror',
    	'application_status_id'
    ];

    /*
    |---------------------
    |   Associations
    |---------------------
    */

    // belongs to personal detail
    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }

    // belongs to job application
    public function job(){
    	return $this->belongsTo('App\Models\Job');
    }

    // belongs to application status
    public function application_status(){
    	return $this->belongsTo('App\Models\ApplicationStatus','application_status_id','stat_id');
    }

    public function initial_screening(){
        return $this->hasOne('App\Models\InitialScreening');
    }

	public function final_interview(){
        return $this->hasOne('App\Models\FinalInterview');
    }

    public function job_orientation(){
        return $this->hasOne('App\Models\JobOrientation');
    }


    /*
    |---------------------
    |   Custom Helpers
    |---------------------
    */
    public static function search($skey){
        $query = DB::table('applicants')
                ->join('people','applicants.id','=','people.id')
                ->leftJoin('application_statuses', 'application_statuses.id', '=', 'applicants.application_status_id');

        if(!empty($skey))
            $query->whereRaw("concat(people.first_name,' ',people.middle_name, ' ', people.last_name) LIKE ?",['%'.$skey.'%']);

        return $query->orderBy('applicants.id','asc')->get(['first_name','middle_name','last_name','mobile_1','email','person_id','applicants.id as applicant_id','applicants.application_status_id','application_statuses.name as status_name']);
	}

    public function applied_date(){
        return date('m/d/Y', strtotime($this->created_at));
    }


    /*
    |------------------------
    |     Custom Attributes
    |------------------------
    */

    // used to create custom attribute 'job_name'
    protected $appends = ['job_name'];
    
    public function getJobNameAttribute(){
        return $this->job->name;
    }

}
