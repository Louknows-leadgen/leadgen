<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InterviewHistory;
use Session;

class InterviewHistoriesController extends Controller
{
    //
    public function index(){
    	$interviewer_id = Auth::id();
    	$interviews = InterviewHistory::where('interviewer_id','=',$interviewer_id)
    	                                ->paginate(5);
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

        $name = implode(' ',[$interview->applicant_first_name, $interview->applicant_last_name]);
        Session::flash('success',"$name was removed from the history list");
    }

    public function search(Request $request){
        $user_id = Auth::id();
        $interviews = InterviewHistory::search($request->skey, $user_id);
        $skey = $request->skey;

        if($request->ajax())
            return view('application.interview_history.search-result',compact('interviews','skey'));

        return view('application.interview_history.search-page',compact('interviews','skey'));
    }
}
