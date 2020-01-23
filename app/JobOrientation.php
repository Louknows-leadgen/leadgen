<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOrientation extends Model
{
    //
    protected $fillable = [
    	'applicant_id',
    	'jo_date'
    ];

    public function applicant(){
    	return $this->belongsTo('App\Applicant');
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

    /*
    |---------------------
    |   Accessors
    |---------------------
    */
    public function getJoDateAttribute($value){
        $date = date_create_from_format("Y-m-d",$value);
        return date_format($date,"m/d/Y");
    }
}
