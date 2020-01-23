<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    public function initial_screening(){
    	return $this->hasOne('App\InitialScreening');
    }
}
