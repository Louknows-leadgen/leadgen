<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    //
    protected $fillable = [
    	'person_id',
    	'employer',
    	'role_name',
    	'start_date',
    	'end_date',
    	'role_desc'
    ];

    public function person(){
        return $this->belongsTo('App\Models\Person');
    }

    //-- mutator
    public function setStartDateAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['start_date'] = date_format($date,'Y-m-d');
    }

    public function setEndDateAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['end_date'] = date_format($date,'Y-m-d');
    }
}
