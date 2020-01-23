<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    //
    protected $fillable = [
    	'person_id',
    	'full_name',
    	'birthday'
    ];

    public function person(){
        return $this->belongsTo('App\Person');
    }

    //-- mutator
    public function setBirthdayAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['birthday'] = date_format($date,'Y-m-d');
    }
}
