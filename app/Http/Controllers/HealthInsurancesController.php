<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\HealthInsurance;

class HealthInsurancesController extends Controller
{
    //
    public function store(Request $request){

    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'hmo_id' => 'required'
    	]);

    	if($validator->passes()){
    		$hmo = Employee::find($request->id)->health_insurances()->create([
    			     'name' => $request->name,
    			     'hmo_id' => $request->hmo_id
    		]);
    		return response()->json(['id'=>$hmo->id,'success'=>'Success! Created hmo for the dependent']);
    	}else{
    		return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
    	}

    }

    public function destroy($id){
        HealthInsurance::find($id)->delete();
        return response()->json(['success'=>'Success! Removed dependent\'s hmo']);
    }
}
