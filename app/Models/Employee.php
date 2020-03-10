<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{

	protected $fillable = [
		'person_id',
		'company_number',
		'bank_account',
		'cost_center_id',
		'cluster_id',
		'site_id',
		'job_id',
		'status',
		'company_id',
		'date_signed',
		'contract_id',
		'department_id',
		'employee_id',
		'jo_date',
		'nesting_date',
		'eval_period',
		'reprofile_date',
		'trng_ext_date',
		'start_date',
		'month_eval3',
		'month_eval5',
		'assoc_date',
		'consultant_date',
		'regularize_date',
		'medilink_id'
	];

    /*
    |---------------------
    |   Association
    |---------------------
    */
    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }

    public function cluster(){
        return $this->belongsTo('App\Models\Cluster');
    }

    public function site(){
        return $this->belongsTo('App\Models\Site');
    }

    public function job(){
        return $this->belongsTo('App\Models\Job');
    }

    public function contract(){
        return $this->belongsTo('App\Models\Contract');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function government_detail(){
        return $this->hasOne('App\Models\GovernmentDetail');
    }

    /*
    |---------------------
    |   Mutators
    |---------------------
    */
    public function setJoDateAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['jo_date'] = date_format($date,"Y-m-d");
    }

    public function setDateSignedAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['date_signed'] = date_format($date,"Y-m-d");
    	}
    }

    public function setNestingDateAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['nesting_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setEvalPeriodAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['eval_period'] = date_format($date,"Y-m-d");
    	}
    }

    public function setReprofileDateAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['reprofile_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setTrngExtDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['trng_ext_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setStartDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['start_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setMonthEval3Attribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['month_eval3'] = date_format($date,"Y-m-d");
    	}
    }

    public function setMonthEval5Attribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['month_eval5'] = date_format($date,"Y-m-d");
    	}
    }

    public function setAssocDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['assoc_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setConsultantDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['consultant_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setRegularizeDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['regularize_date'] = date_format($date,"Y-m-d");
    	}
    }

    /*
    |---------------------
    |   Helpers
    |---------------------*/

    public static function generate_id($start_date){
        $rank = self::whereDate('start_date',$start_date)->count() + 1;
        $pos = explode('.',$rank / 1000);
        $month = date('m',strtotime($start_date));
        $year = date('Y',strtotime($start_date));

        $id = 'DCI-'.$year.$month.$pos[1]; 
  
        return $id;
    }

    public static function get_employee_id($employee_name){
    	$employee = DB::table('employees as e')
				       ->join('people as p','p.id', '=', 'e.person_id')
				       ->whereRaw("concat(p.first_name,' ',p.last_name) = ?",[$employee_name])
				       ->get('e.id as employee_id')
				       ->first();

		return isset($employee) ? $employee->employee_id : null;	       
    }

    public static function all_employees_name(){
        $employees = DB::table('employees as e')
                     ->join('people as p','p.id','=','e.person_id')
                     ->selectRaw("e.id,e.person_id,concat(p.first_name,' ',p.last_name) as name")
                     ->orderBy('name')
                     ->get();

        return $employees;
    }
}
