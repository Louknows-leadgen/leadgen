<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist;
use App\Models\Applicant;
use App\Models\Employee;

class BlacklistsController extends Controller
{
    //
    public function index(){
    	
    }

    public function hit($applicant_id){
    	$blacklists = hit_profiles($applicant_id);

    	return view('blacklist.hit',compact('blacklists'));
    }

    public function create_applicant($applicant_id){
    	$applicant = Applicant::find($applicant_id);
    	return view('blacklist.create_applicant',compact('applicant'));
    }

    public function create_employee($employee_id){
    	return view('blacklist.create_employee',compact('employee'));
    }
}












