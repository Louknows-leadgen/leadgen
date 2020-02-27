<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PusherNotification extends Model
{
    //
    protected $fillable = [
    	'full_name',
    	'applied_for',
    	'procedure_url',
    	'applicant_id'
    ];

    public function applicant(){
    	return $this->belongsTo('App\Models\Applicant');
    }
}
