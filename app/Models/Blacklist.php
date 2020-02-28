<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Applicant;
// use Illuminate\Support\Facades\DB;

class Blacklist extends Model
{
    //
    protected $fillable = [
    	'company_id',
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'gender',
        'city_address',
        'reason',
        'blacklisted_by'
    ];

}
