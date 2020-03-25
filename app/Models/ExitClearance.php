<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitClearance extends Model
{
    //
    protected $fillable = [
    	'employee_id',
    	'ext_type',
    	'last_pay_amt',
    	'cleared_dt',
    	'last_employment_dt',
    	'last_pay_dt',
    	'reason'
    ];

    /*
    |------------------------
    |		Association
    |------------------------*/
    public function employee(){
    	return $this->belongsTo('App\Models\Employee');
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
}
