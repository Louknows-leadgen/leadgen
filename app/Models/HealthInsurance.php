<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{
    //
    protected $fillable = [
    	'name',
    	'hmo_id',
    	'employee_id'
    ];

    public function employee(){
    	return $this->belongsTo('App\Models\Employee');
    }

}
