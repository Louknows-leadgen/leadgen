<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinalInterview;
use App\User;
use App\Applicant;
use App\Mail\SendMail;

class FinalInterviewsController extends Controller
{
    //
    public function store(Request $request){
    	$id = $request->applicant_id;
        $applicant = Applicant::find($id);
        $applicant->update(['application_status_id'=>4]); // For Final Interview
    	$fin = FinalInterview::create($request->all());
        $to_email = User::find($request->interviewer_id)->email;

        // send email
        $details = [
            'url' => "http://recruitment.build/application/candidate/$id/profile",
            'name' => $applicant->person->name(),
            'job' => $applicant->job->name,
            'sched' => $fin->schedule,
            'interviewer' => User::find($request->interviewer_id)->first_name
        ];

        \Mail::to($to_email)->send(new SendMail($details));
    	
    	return redirect()->route('applications.procedure',['applicant_id'=>$applicant->id]);
    }

    public function edit($fin_id){
    	$fin = FinalInterview::find($fin_id);
    	$interviewers = User::interviewers();

    	return view('application.final_interview.edit',compact('fin','interviewers'));
    }

    public function update($fin_id, Request $request){
        $procedure = FinalInterview::find($fin_id);
        $procedure->update($request->all());

        //return redirect()->route('applications.process',['applicant_id'=>$id, 'status_id'=>4]); // 4 is the status of Final Interview
        return view('application.final_interview.show',compact('procedure'));
    }

    public function update_result($fin_id, Request $request){
        $fin = FinalInterview::find($fin_id);
        $is_done['is_done'] = 1;
        $request->merge($is_done);
        $fin->update($request->all());

        if($request->result == 'Pass')
            $fin->applicant()->update(['application_status_id'=>6]); // 6 is the status of Job Offer schedule
        else
            $fin->applicant()->update(['application_status_id'=>5]); // 5 is the status of Final Interview Failed
        return redirect()->action('ApplicationsController@candidates');
    }

    public function form_partial($fin_id){
        $procedure = FinalInterview::find($fin_id);

        return view('application.final_interview._interview-form',compact('procedure'));
    }
}
