<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    //
    protected $fillable = [
    	'cluster_name'
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
