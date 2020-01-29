<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $fillable = [
    	'person_id',
    	'school_name',
    	'graduated_date',
    	'degree'
    ];

    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }
}
