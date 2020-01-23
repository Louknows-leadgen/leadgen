<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InitialScreening;
use App\Applicant;

class InitialScreeningsController extends Controller
{
    //
    public function store(Request $request){
    	$applicant = Applicant::find($request->applicant_id);
        InitialScreening::create($request->all());
    	if($request->overall_result == 'Pass'){
    		$applicant->application_status_id = 3; // Appoint Final Interview
            $applicant->save();
            return redirect()->route('applications.process',['applicant_id'=>$applicant->id, 'status_id'=>3]);
        }
    	else{
    		$applicant->application_status_id = 2; // Initial Screening - Failed
            $applicant->save();
            return redirect()->route('root');
        } 	       
    }
}
