<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\GovernmentDetail;

class GovernmentDetailsController extends Controller
{
    //
    public function store(Request $request){
    	$employee = Employee::find($request->employee_id);
    	$government_detail = $employee->government_detail();
    	if($gd = $government_detail->create($request->all()))
			return response()->json(['id'=>$gd->id]);
		else
			return response()->json(['error'=>'Something went wrong']);
    }		

    public function update($gov_det, Request $request){
    	$government_detail = GovernmentDetail::find($gov_det);
    	if($government_detail->update($request->all()))
			return response()->json(['success'=>'Record has been updated']);
		else
			return response()->json(['error'=>'Something went wrong']);
    }
}
