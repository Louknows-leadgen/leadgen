<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    //
    protected $fillable = [
    	'name'
    ];

    public function applicants(){
    	return $this->hasMany('App\Applicant','application_status_id','stat_id');
    }

}
