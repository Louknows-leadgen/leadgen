<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    public function initial_screening(){
    	return $this->hasOne('App\Models\InitialScreening');
    }
}
