<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FinalInterview;
use App\User;
use App\Applicant;
use App\Mail\SendMail;
use App\Rules\CompareDatetime;

class FinalInterviewsController extends Controller
{
    //
    public function store(Request $request){

        $request->validate([
            'schedule' => ['bail','required','date_format:m/d/Y h:i A',new CompareDatetime]
        ],[
            'schedule.required' => 'Schedule date is required.',
            'schedule.date_format' => 'Wrong date format.'
        ]);

        $id = $request->applicant_id;
        $applicant = Applicant::find($id);
        $applicant->update(['application_status_id'=>4]); // For Final Interview
    	$fin = FinalInterview::create($request->all());
        $to_email = User::find($request->interviewer_id)->email;

        // send email
        $details = [
            'url' => route('applications.profile',['applicant_id'=>$id]),
            'name' => $applicant->person->name(),
            'job' => $applicant->job->name,
            'sched' => $fin->schedule,
            'interviewer' => User::find($request->interviewer_id)->first_name
        ];

        \Mail::to($to_email)->send(new SendMail($details));
    	
    	return redirect()->route('applications.procedure',['applicant_id'=>$applicant->id]);
    }

    public function edit($fin_id){
    	$procedure = FinalInterview::find($fin_id);
    	$interviewers = User::interviewers();

    	return view('application.final_interview.edit',compact('procedure','interviewers'));
    }

    public function update($fin_id, Request $request){

        $validator = Validator::make($request->all(), [
            'schedule' => ['bail','required','date_format:m/d/Y h:i A',new CompareDatetime]
        ],[
            'schedule.required' => 'Schedule date is required.',
            'schedule.date_format' => 'Wrong date format.'
        ]);

        if ($validator->fails()){
            if($request->ajax()){
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
            }else{
                return redirect()->route('applications.procedure')
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $procedure = FinalInterview::find($fin_id);
        $procedure->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('fin.form',['id'=>$fin_id])]);
        }else{
            return view('application.final_interview.show',compact('procedure'));
        }

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
