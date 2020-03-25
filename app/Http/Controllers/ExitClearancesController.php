<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\ExitClearance;
use App\Models\ExitType;

class ExitClearancesController extends Controller
{
    //
	public function index(){
		$exit_clearances = ExitClearance::with('employee')->get();

		return view('exit_clearance.index',compact('exit_clearances'));
	}

    public function create($employee_id){
    	$employee = Employee::find($employee_id);
    	$exit_types = ExitType::all();
    	return view('exit_clearance.create',compact('employee','exit_types'));
    }

    public function store(Request $request){
    	$validated = $request->validate([
    		'employee_id' => 'required',
    		'ext_type' => 'required',
    		'last_pay_amt' => 'nullable|integer',
			'cleared_dt' => 'bail|required_if:clear-switch,on|nullable|date_format:m/d/Y',
			'last_employment_dt' => 'nullable|date_format:m/d/Y',
			'last_pay_dt' => 'nullable|date_format:m/d/Y',
			'reason' => 'nullable'
		],[
			'cleared_dt.required_if' => 'Cleared date is required',
			'cleared_dt.date_format' => 'Wrong date format',
			'last_employment_dt.date_format' => "Wrong date format",
			'last_pay_dt.date_format' => "Wrong date format"
		]);

    	ExitClearance::create($validated);
    	return redirect()->route('ext-clr.index');
    }

   
}
