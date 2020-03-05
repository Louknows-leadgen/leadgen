<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contract;

class ContractsController extends Controller
{
    //
    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'contract_name' => ['bail','required','unique:contracts,contract_name']
        ],[
            'contract_name.required' => 'Contract name is required.'
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        Contract::create($request->all());

        return response()->json(['success'=>'Successfully added a contract']);
    }
}
