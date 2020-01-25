<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InitialScreening;
use App\Applicant;

class InitialScreeningsController extends Controller
{
    //
    public function store(Request $request){

        $request->validate([
            'test_score' => 'required'
        ],[
            'test_score.required' => 'Test score is required.'
        ]);

    	$applicant = Applicant::find($request->applicant_id);
        InitialScreening::create($request->all());
    	if($request->overall_result == 'Pass'){
    		$applicant->application_status_id = 3; // Appoint Final Interview
            $applicant->save();
            return redirect()->route('applications.procedure',['applicant_id'=>$applicant->id]);
        }
    	else{
    		$applicant->application_status_id = 2; // Initial Screening - Failed
            $applicant->save();
            return redirect()->route('root');
        } 	       
    }
}
