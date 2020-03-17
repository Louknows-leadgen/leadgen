<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HmoController extends Controller
{
    //
    public function store(Request $request){
    	return response()->json(['success'=>'Created new dependent']);
    }
}
