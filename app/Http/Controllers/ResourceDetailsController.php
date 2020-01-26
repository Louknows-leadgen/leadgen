<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceDetailsController extends Controller
{
    //
    public function index($person_id){
    	return view('resource_detail.index',compact('person_id'));
    }
}
