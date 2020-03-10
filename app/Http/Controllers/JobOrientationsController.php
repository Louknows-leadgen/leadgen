<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobOrientation;
use App\Models\Applicant;
use App\Rules\CompareDatetime;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendJONotifMail;
use Session;


class JobOrientationsController extends Controller
{
    //
    public function store(Request $request){

        $request->validate([
            'jo_date' => ['bail','required','date_format:m/d/Y h:i A',new CompareDatetime]
        ],[
            'jo_date.required' => 'Schedule date is required.',
            'jo_date.date_format' => 'Wrong date format.'
        ]);

    	$id = $request->applicant_id;
    	if(JobOrientation::create($request->all())){
        	$applicant = Applicant::find($id);
            $applicant->update(['application_status_id'=>application_status('FJO')]); // For Job Orientation
            $email_to = $applicant->person->email;

            $details = [
                'name' => $applicant->person->name(),
                'schedule' => $applicant->job_orientation->jo_date
            ];

            Mail::to($email_to)->send(new SendJONotifMail($details));
            Session::flash('success',"Email has been sent to the applicant");

        	return redirect()->route('applications.procedure',['applicant_id'=>$id]);
        }else{
            Session::flash('error',"Failed to submit the form.");
            return redirect()->route('applications.procedure',['applicant_id'=>$id]);
        }
    }

    public function edit($jo_id){
    	$procedure = JobOrientation::find($jo_id);
        $applicant_id = $procedure->applicant->id;

    	return view('application.job_orientation.edit',compact('procedure','applicant_id'));
    }

    public function update($jo_id, Request $request){

        $validator = Validator::make($request->all(), [
            'jo_date' => ['bail','required','date_format:m/d/Y h:i A',new CompareDatetime]
        ],[
            'jo_date.required' => 'Schedule date is required.',
            'jo_date.date_format' => 'Wrong date format.'
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

        $procedure = JobOrientation::find($jo_id);
        $id = $procedure->applicant_id;
        $procedure->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('jo.form',['id'=>$id])]);
        }else{
            return redirect()->route('applications.procedure',['applicant_id'=>$id]);
        }
    }

    // this is used when the user clicks cancel when editing the schedule on the job orientation tab
    public function form($applicant_id){
        $applicant = Applicant::with('job_orientation')->find($applicant_id);

        return view('application.job_orientation.show',compact('applicant'));
    }
}
