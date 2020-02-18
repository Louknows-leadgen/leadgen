<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewHistoriesController extends Controller
{
    //
    public function index(){
    	$interviews = InterviewHistory::all();
    	return view('application.interview_history.index',compact('interviews'));
    }

    // store is done on the final interview update result route

    public function show($interview_id){
    	$interview = InterviewHistory::find($interview_id);
    	return view('application.interview_history.show',compact('interview'));
    }


    public function destroy($interview_id){
    	$interview = InterviewHistory::find($interview_id);
        $interview->delete();
    }
}
