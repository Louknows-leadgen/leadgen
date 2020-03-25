<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitClearance extends Model
{
    //
    protected $fillable = [
    	'employee_id',
    	'exit_type_id',
    	'last_pay_amt',
    	'cleared_dt',
    	'last_employment_dt',
    	'last_pay_dt',
        'claimed_dt',
    	'reason'
    ];

    /*
    |------------------------
    |		Association
    |------------------------*/
    public function employee(){
    	return $this->belongsTo('App\Models\Employee');
    }

    public function exit_type(){
    	return $this->belongsTo('App\Models\ExitType');
    }


    /*
    |---------------------
    |   Mutators
    |---------------------
    */
    public function setClearedDtAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['cleared_dt'] = date_format($date,"Y-m-d");
        }
    }

    public function setLastEmploymentDtAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['last_employment_dt'] = date_format($date,"Y-m-d");
    	}
    }

    public function setLastPayDtAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['last_pay_dt'] = date_format($date,"Y-m-d");
    	}
    }



    /*
    |------------------------
    |    Custom Attributes
    |------------------------*/

    protected $appends = [
        'exit_type_name'
    ];

    public function getExitTypeNameAttribute(){
        return $this->exit_type->name;
    }
}
