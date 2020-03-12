<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    //
    public function government_detail(){
        return $this->hasMany('App\Models\GovernmentDetail');
    }

}
