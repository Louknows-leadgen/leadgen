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
        $applicant = Applicant::with('application_status','initial_screening','final_interview','job_orientation')->find($applicant_id);
        
        $tests = Test::all();
        $interviewers = User::interviewers();
        
        $init_view = '';
        $fin_view = '';
        $jo_view = '';

        // this is for the view on the initial screening tab
        if($applicant->initial_screening()->exists()){
            $init_view = 'application.initial_screen.show';
        }else{
            $init_view = 'application.initial_screen.new';
        }

        // this is for the view on the final interview tab
        if($applicant->application_status->id < 3)
            $fin_view = 'application.unavailable';
        elseif($applicant->final_interview()->exists()){
            $fin_view = 'application.final_interview.show';
        }else{
            $fin_view = 'application.final_interview.new';
        }

        // this is for the job orientation view tab
        if($applicant->application_status->id < 6)
            $jo_view = 'application.unavailable';
        elseif($applicant->job_orientation()->exists()){
            $jo_view = 'application.job_orientation.show';
        }else{
            $jo_view = 'application.job_orientation.new';
        }

        return view('application.main',compact('applicant','tests','interviewers','init_view','fin_view','jo_view'));

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
