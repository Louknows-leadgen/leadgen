<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
    	'name'
    ];

    /*
    |---------------------
    |   Association
    |---------------------
    */
    public function applicants(){
    	return $this->hasMany('App\Models\Applicant');
    }

    public function employee(){
    	return $this->hasMany('App\Models\Employee');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

}
