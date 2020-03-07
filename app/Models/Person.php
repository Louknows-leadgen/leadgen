<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    protected $fillable = [
    	'first_name',
    	'middle_name',
    	'last_name',
    	'suffix_name',
    	'mobile_1',
    	'mobile_2',
    	'email',
    	'age',
    	'gender',
    	'birthday',
    	'civil_status',
    	'religion',
    	'weight',
    	'height',
    	'city_address',
    	'province_address',
    	'father_name',
    	'mother_name'
    ];

    /*
    |---------------------
    |   Associations
    |---------------------
    */
    public function applicant(){
    	return $this->hasOne('App\Models\Applicant');
    }

    public function employee(){
    	return $this->hasOne('App\Models\Employee');
    }

    public function spouses(){
    	return $this->hasMany('App\Models\Spouse');
    }

    public function emergency_contacts(){
    	return $this->hasMany('App\Models\EmergencyContact');
    }

    public function dependents(){
    	return $this->hasMany('App\Models\Dependent');
    }

    public function middle_schools(){
    	return $this->hasMany('App\Models\MiddleSchool');
    }

    public function colleges(){
    	return $this->hasMany('App\Models\College');
    }

    public function work_experiences(){
    	return $this->hasMany('App\Models\WorkExperience');
    }

    /*
    |---------------------
    |   Mutators
    |---------------------
    */
    public function setBirthdayAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['birthday'] = date_format($date,'Y-m-d');
    }


    /*
    |---------------------
    |   Helpers
    |---------------------
    */
    public function elem(){
        return $this->middle_schools()->where('education_type',1)->first();
    }

    public function high(){
        return $this->middle_schools()->where('education_type',2)->first();
    }

    public function name(){
        return $this->first_name . ' ' . $this->last_name;
    }


    public static function get_employee_id($employee_name){
        $employee = DB::table('applicants as e')
                       ->join('people as p','p.id', '=', 'e.person_id')
                       ->whereRaw("concat(p.first_name,' ',p.last_name) = ?",[$employee_name])
                       ->get('e.id as employee_id')
                       ->first();

        return isset($employee) ? $employee->employee_id : null;             
    }

}
 