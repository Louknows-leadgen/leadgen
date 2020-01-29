<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    //
    protected $fillable = [
    	'name'
    ];

    public function applicants(){
    	return $this->hasMany('App\Models\Applicant','application_status_id','stat_id');
    }

}
