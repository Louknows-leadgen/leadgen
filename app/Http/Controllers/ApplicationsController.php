<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InitialScreening;
use App\Models\FinalInterview;
use App\Models\JobOrientation;
use App\Models\Applicant;
use App\Models\Test;
use App\Models\User;

class ApplicationsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkrole:2')->only(['procedure','initial_screening','final-interview','job-orientation']);
        $this->middleware('checkrole:3')->only(['candidates','profile']);
    }

    public function procedure($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $tests = Test::all();
        $interviewers = User::interviewers();
        $procedure = '';
        $view = '';

        switch($applicant->application_status_id)
        {
            case 1:
            case 2:
                if($applicant->initial_screening()->exists()){
                    $procedure = InitialScreening::where('applicant_id','=',$applicant_id)->first();
                    $view = 'application.initial_screen.show';
                }else{
                    $view = 'application.initial_screen.new';
                }
                break;
            case 3:
            case 4:
            case 5:
                if($applicant->final_interview()->exists()){
                    $procedure = FinalInterview::where('applicant_id','=',$applicant_id)->first();
                    $view = 'application.final_interview.show';
                }else{
                    $view = 'application.final_interview.new';
                }
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
                if($applicant->job_orientation()->exists()){
                    $procedure = JobOrientation::where('applicant_id','=',$applicant_id)->first();
                    $view = 'application.job_orientation.show';
                }else{
                    $view = 'application.job_orientation.new';
                }
                break;
        }

        return view('application.main',compact('procedure','view','applicant','tests','interviewers'));
    }

    public function initial_screening($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $tests = Test::all();
        $procedure = '';

        if($applicant->initial_screening()->exists()){
            $procedure = InitialScreening::where('applicant_id','=',$applicant_id)->first();
            $view = 'application.initial_screen.show';
        }else{
            $view = 'application.initial_screen.new';
        }

        return view($view,compact('applicant','tests','procedure'));
    }

    public function final_interview($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $interviewers = User::interviewers();
        $procedure = '';

        if($applicant->application_status_id < 3){
            $view = 'application.unavailable';
        }elseif($applicant->final_interview()->exists()){
            $procedure = FinalInterview::where('applicant_id','=',$applicant_id)->first();
            $view = 'application.final_interview.show';
        }else{
            $view = 'application.final_interview.new';
        }

        return view($view,compact('applicant','interviewers','procedure'));
    }

    public function job_orientation($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $procedure = '';

        if($applicant->application_status_id < 6){
            $view = 'application.unavailable';
        }elseif($applicant->job_orientation()->exists()){
            $procedure = JobOrientation::where('applicant_id','=',$applicant_id)->first();
            $view = 'application.job_orientation.show';
        }else{
            $view = 'application.job_orientation.new';
        }

        return view($view,compact('applicant','procedure'));
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
