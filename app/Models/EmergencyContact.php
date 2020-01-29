<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    //
    protected $fillable = [
    	'person_id',
    	'full_name',
    	'contact_no',
    	'relationship',
    	'address'
    ];

    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }
}
