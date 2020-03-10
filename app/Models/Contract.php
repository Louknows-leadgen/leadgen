<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = [
    	'contract_name'
    ];

    /*
    |---------------------
    |   Association
    |---------------------
    */
    public function employee(){
    	return $this->hasMany('App\Models\Employee');
    }
}
