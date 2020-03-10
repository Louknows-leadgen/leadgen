<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentDetail extends Model
{
    //
    protected $fillable = [
    	'sss_no',
    	'hdmf_no',
    	'phic_no',
    	'tin_no',
    	'tax_id'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
