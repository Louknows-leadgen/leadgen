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
use App\Models\InterviewHistory;
use Session;

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
        if(in_array($applicant->application_status_id,[1,2]))
            $fin_view = 'application.unavailable';
        elseif($applicant->final_interview()->exists()){
            $fin_view = 'application.final_interview.show';
        }else{
            $fin_view = 'application.final_interview.new';
        }

        // this is for the job orientation view tab
        if(in_array($applicant->application_status_id,[1,2,3,4,5,11]))
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
        $interviews = $user->final_interviews()->with(['applicant'])->where('is_done','=',0)->paginate(5);

        return view('application.candidate.candidate_list',compact('interviews'));
    }

    public function search(Request $request){
        $user_id = Auth::id();
        $candidates = FinalInterview::search($request->skey, $user_id);
        $skey = $request->skey;

        if($request->ajax())
            return view('application.candidate.search-result',compact('candidates','skey'));

        return view('application.candidate.search-page',compact('candidates','skey'));
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

    public function no_show($applicant_id, Request $request){
        $fin_interview = Applicant::find($applicant_id)->final_interview;
        
        // update final interviews table
        $fin_interview->result = 'No Show';
        $fin_interview->is_done = 1;
        

        if($fin_interview->save()){
            // insert to history
            $info = Applicant::with(['person','final_interview'])->find($applicant_id);
            $history_data['interviewer_id'] = $info->final_interview->interviewer_id;
            $history_data['applicant_first_name'] = $info->person->first_name;
            $history_data['applicant_middle_name'] = $info->person->middle_name;
            $history_data['applicant_last_name'] = $info->person->last_name;
            $history_data['applicant_applied_for'] = $info->job->name;
            $history_data['applicant_applied_date'] = $info->applied_date();
            $history_data['result'] = $info->final_interview->result;
            $history_data['remarks'] = $info->final_interview->remarks;

            InterviewHistory::create($history_data);

            // update application status
            $fin_interview->applicant()->update(['application_status_id'=>11]);

            Session::flash('success',"{$info->person->name()} was tagged as no show");
        }else{
            Session::flash('error','Something went wrong');
        }
    }
}
