<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class InterviewHistory extends Model
{
	//
	protected $fillable = [
		'interviewer_id',
		'applicant_first_name',
		'applicant_middle_name',
		'applicant_last_name',
		'applicant_applied_for',
		'applicant_applied_date',
		'result',
		'remarks'
	];

    /*
    |---------------------------
    |      Association
    |---------------------------
    */
    public function user(){
        return $this->belongsTo('App\Models\User','interviewer_id');
    }

    /*
    |---------------------------
    |      Accessor and Mutator
    |---------------------------
    */
    public function setApplicantAppliedDateAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['applicant_applied_date'] = $date;
    }

    public function getApplicantAppliedDateAttribute($value){
    	$date = date_create($value);
        return date_format($date,'m/d/Y');
    }

    /*
    |---------------------------
    |      Custom Attribute
    |---------------------------
    */

    // used to create custom attribute 'name'
    protected $appends = ['full_name'];
    
    public function getFullNameAttribute(){
        return $this->applicant_first_name . ' ' . $this->applicant_last_name;
    }



    /*
    |---------------------------
    |      Custom Helpers
    |---------------------------
    */
    public static function search($skey, $user_id){
        $query = DB::table('interview_histories as ih')
                 ->where('ih.interviewer_id','=',$user_id);

        if(!empty($skey))
            $query->whereRaw("concat(ih.applicant_first_name, ' ', ih.applicant_last_name) LIKE ?",['%'.$skey.'%']);

        return $query->paginate(5);
    }
}
