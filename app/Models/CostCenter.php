<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    //
    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }
}
