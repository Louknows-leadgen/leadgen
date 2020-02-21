<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobOffering extends Model
{
    //


    /*
    |---------------------
    |   Custom Helpers
    |---------------------
    */
    public static function search($skey){
        $query = DB::table('applicants as a')
                 ->leftJoin('people as p', 'p.id', '=', 'a.person_id')
                 ->leftJoin('jobs as j', 'j.id', '=', 'a.job_id')
                 ->where('a.application_status_id','=',7);

        if(!empty($skey))
            $query->whereRaw("concat(p.first_name, ' ', p.last_name) LIKE ?",['%'.$skey.'%']);

        return $query->paginate(5,['a.id as applicant_id','p.id as person_id','p.gender','p.first_name','p.last_name','j.name as job_name']);
    }
}


