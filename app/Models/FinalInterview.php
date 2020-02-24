<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class FinalInterview extends Model
{
    //
	protected $fillable = [
    	'applicant_id',
    	'interviewer_id',
    	'schedule',
    	'result',
    	'remarks',
        'is_done',
        'scheduler'
    ];

    /*
    |---------------------
    |   Associations
    |---------------------
    */

    public function user(){
        return $this->belongsTo('App\Models\User','interviewer_id');
    }

    public function applicant(){
        return $this->belongsTo('App\Models\Applicant');
    }


    /*
    |---------------------
    |   Mutators
    |---------------------
    */
    public function setScheduleAttribute($value){
        $date = date_create_from_format("m/d/Y g:i A",$value);
        $this->attributes['schedule'] = date_format($date,"Y-m-d H:i:s");
    }

    /*
    |---------------------
    |   Accessors
    |---------------------
    */
    public function getScheduleAttribute($value){
        $date = date_create_from_format("Y-m-d H:i:s",$value);
        return date_format($date,"m/d/Y g:i A");
    }

    /*
    |------------------------
    |     Custom Attributes
    |------------------------
    */

    // used to create custom attribute specified inside the bracket
    protected $appends = ['interviewer'];

    public function getInterviewerAttribute(){
        return $this->user->name;
    }


    /*
    |---------------------
    |   Custom Helpers
    |---------------------
    */
    public static function search($skey, $user_id){
        $query = DB::table('final_interviews as fi')
                 ->leftJoin('applicants as a', 'a.id', '=', 'fi.applicant_id')
                 ->leftJoin('jobs as j', 'j.id', '=', 'a.job_id')
                 ->leftJoin('people as p', 'p.id', '=', 'a.person_id')
                 ->where('fi.interviewer_id','=',$user_id)
                 ->where('fi.is_done','=',0);

        if(!empty($skey))
            $query->whereRaw("concat(p.first_name, ' ', p.last_name) LIKE ?",['%'.$skey.'%']);

        return $query->paginate(5,['p.first_name','p.middle_name','p.last_name','j.name','fi.schedule','fi.applicant_id']);
    }

}