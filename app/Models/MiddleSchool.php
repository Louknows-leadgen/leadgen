<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiddleSchool extends Model
{
    //
    protected $fillable = [
    	'school_name',
    	'education_type',
    	'graduated_date'
    ];

    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }

}
