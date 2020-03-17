<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    //
    public function api_department(Request $request){
    	$position = Job::find($request->job_id);
    	$department = [
    		'department_id' => $position->department->id,
    		'department_name' => $position->department->department_name
    	];

    	return response()->json($department);
    }
}
