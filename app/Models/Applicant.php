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

    public function pusher_notification(){
        return $this->hasOne('App\Models\PusherNotification');
    }


    /*
    |---------------------
    |   Custom Helpers
    |---------------------
    */
    public static function search($skey, $stat_filter){
        $query = DB::table('applicants')
                ->join('people','applicants.person_id','=','people.id')
                ->leftJoin('application_statuses', 'application_statuses.id', '=', 'applicants.application_status_id')
                ->where(function($q) use($stat_filter){
                    $q->where('application_statuses.id','=',$stat_filter)
                      ->orWhereRaw('? = 0',$stat_filter);
                  });

        if(!empty($skey))
            $query->whereRaw("concat(people.first_name,' ',people.middle_name, ' ', people.last_name) LIKE ?",['%'.$skey.'%']);

        return $query->orderBy('applicants.id','desc')->paginate(5,['first_name','middle_name','last_name','mobile_1','email','person_id','applicants.id as applicant_id','applicants.application_status_id','application_statuses.name as status_name']);
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
    protected $appends = ['job_name','avatar','full_name'];
    
    public function getJobNameAttribute(){
        return $this->job->name;
    }

    public function getAvatarAttribute(){
        switch ($this->person->gender) {
            case 'Male':
                return asset('images/man.svg');
                break;
            
            case 'Female':
                return asset('images/woman.svg');
                break;
        }
    }

    public function getFullNameAttribute(){
        return $this->person->name();
    }

}
