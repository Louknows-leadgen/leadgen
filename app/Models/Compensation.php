<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    //
    protected $fillable = [
    	'basic_salary',
    	'meal_allowance',
    	'transpo_allowance',
    	'comm_allowance',
    	'rice_subsidy',
    	'night_diff',
    	'double_allowance',
    	'attendance_bonus',
    	'toic_qa_allowance',
    	'productivity_bonus',
    	'team_perf_bonus'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
