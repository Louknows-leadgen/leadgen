<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\InitialScreening;
use App\FinalInterview;
use App\JobOrientation;
use App\Applicant;
use App\Test;
use App\User;

class ApplicationsController extends Controller
{
    public function process($applicant_id,$stat_id){
        $applicant = Applicant::find($applicant_id);
        $tests = Test::all();
        $interviewers = User::interviewers();
        $stat_id = $stat_id > $applicant->application_status_id ? $applicant->application_status_id : $stat_id;
        
        switch($stat_id){
            case 1: // status is for initial screening
            case 2: // Initial Screening Failed
                $count = InitialScreening::where('applicant_id','=',$applicant_id)->count();
                if($count > 0){
                    $init_screen = InitialScreening::where('applicant_id','=',$applicant_id)->first();
                    return view('application.initial_screen.show',compact('applicant','init_screen'));
                }else
                    return view('application.initial_screen.new',compact('applicant','tests'));
                break;
            case 3: // Appoint Final Interview
            case 4: // For Final Interview
            case 5: // Final Interview Failed
                $count = FinalInterview::where('applicant_id','=',$applicant_id)->count();
                if($count > 0){
                    $fin_interview = FinalInterview::where('applicant_id','=',$applicant_id)->first();
                    return view('application.final_interview.show',compact('applicant','fin_interview'));
                }else
                    return view('application.final_interview.new',compact('applicant','interviewers'));
                break;
            case 6: // Schedule Job Orientation
            case 7: // For Job Orientation
            case 8: // No Show
            case 9: // Hired
            case 10: // Declined Offer
                $count = JobOrientation::where('applicant_id','=',$applicant_id)->count();
                if($count > 0){
                    $job_orient = JobOrientation::where('applicant_id','=',$applicant_id)->first();
                    return view('application.job_offer.show',compact('applicant','job_orient'));
                }else
                    return view('application.job_offer.new',compact('applicant'));
                break;    
        }
    }
  

    public function candidates(){
        $user = Auth::user();
        $user_id = Auth::id();
        $interviews = $user->final_interviews()->with(['applicant'])->where('is_done','=',0)->get();

        return view('application.candidate.candidate_list',compact('interviews','user_id'));
    }

    public function search(Request $request){
        $candidates = FinalInterview::search($request->skey, $request->id);

        return view('application.candidate.search',compact('candidates'));
    }

    public function profile($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $info = $applicant->person()->with(['colleges','work_experiences'])->first();
        $elem = $applicant->person->elem();
        $high = $applicant->person->high();
        $init = $applicant->initial_screening;
        $fin = $applicant->final_interview;

        return view('application.candidate.candidate_profile',compact('info','elem','high','init','fin'));
    }
}
