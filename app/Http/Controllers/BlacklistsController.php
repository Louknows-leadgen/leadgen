<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist;

class BlacklistsController extends Controller
{
    //
    public function index(){
    	
    }

    public function hit($applicant_id){
    	$blacklists = hit_profiles($applicant_id);

    	return view('blacklist.hit',compact('blacklists'));
    }
}












