<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitType extends Model
{
    //

    /*
    |------------------------
    |		Association
    |------------------------*/

    public function exit_clearances(){
    	return $this->hasMany('App\Models\ExitClearance');
    }


    
}
