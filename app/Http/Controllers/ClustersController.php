<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cluster;

class ClustersController extends Controller
{
    //
    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'cluster_name' => ['bail','required','unique:clusters,cluster_name']
        ],[
            'cluster_name.required' => 'Cluster name is required.'
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        Cluster::create($request->all());

        return response()->json(['success'=>'Successfully added a cluster']);
    }

}
