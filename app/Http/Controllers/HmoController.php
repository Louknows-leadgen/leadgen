<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HmoController extends Controller
{
    //
    public function store(Request $request){

    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'medilink_number' => 'required'
    	]);

    	if($validator->passes()){
    		return response()->json(['success'=>'Created new dependent']);
    	}else{
    		return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
    	}

    }
}
