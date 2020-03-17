<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /*
    |-------------------------
    |     Association
    |-------------------------*/

    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }

    public function jobs(){
    	return $this->hasMany('App\Models\Job');
    }


    /*
    |-------------------------
    |      Custom Attributes
    |-------------------------*/

    protected $appends = ['positions'];
    
    public function getPositionsAttribute(){
        return $this->jobs->sortBy('name');
    }

}
