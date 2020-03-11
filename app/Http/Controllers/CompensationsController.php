<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Compensation;

class CompensationsController extends Controller
{
    //
    public function store(Request $request){
    	$employee = Employee::find($request->employee_id);
    	$compensation = $employee->compensation();
    	if($comp = $compensation->create($request->all()))
			return response()->json(['id'=>$comp->id]);
		else
			return response()->json(['error'=>'Something went wrong']);
    }

    public function update($compensation_id, Request $request){
    	$compensation = Compensation::find($compensation_id);
    	if($compensation->update($request->all()))
			return response()->json(['success'=>'Record has been updated']);
		else
			return response()->json(['error'=>'Something went wrong']);
    }

}
