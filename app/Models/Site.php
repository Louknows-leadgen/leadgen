<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //

    /*
    |---------------------
    |   Association
    |---------------------
    */
    public function employee(){
    	return $this->hasMany('App\Models\Employee');
    }
}
