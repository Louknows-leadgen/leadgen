<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
    	'name'
    ];

    public function applicants(){
    	return $this->hasMany('App\Models\Applicant');
    }
}
