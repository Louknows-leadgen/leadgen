<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JobOrientation;
use App\Applicant;



class JobOrientationsController extends Controller
{
    //
    public function store(Request $request){

        $request->validate([
            'jo_date' => ['bail','required','date_format:m/d/Y','after_or_equal:today']
        ],[
            'jo_date.required' => 'Schedule date is required.',
            'jo_date.date_format' => 'Wrong date format.',
            'jo_date.after_or_equal' => 'Date should be present or above.'
        ]);

    	$id = $request->applicant_id;
    	JobOrientation::create($request->all());
    	Applicant::find($id)->update(['application_status_id'=>7]);

    	return redirect()->route('applications.procedure',['applicant_id'=>$id]);
    }

    public function edit($jo_id){
    	$procedure = JobOrientation::find($jo_id);
        $applicant_id = $procedure->applicant->id;

    	return view('application.job_orientation.edit',compact('procedure','applicant_id'));
    }

    public function update($jo_id, Request $request){

        $validator = Validator::make($request->all(), [
            'jo_date' => ['bail','required','date_format:m/d/Y','after_or_equal:today']
        ],[
            'jo_date.required' => 'Schedule date is required.',
            'jo_date.date_format' => 'Date format should be mm/dd/yyyy.',
            'jo_date.after_or_equal' => 'Date should be present or above.'
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
            return response()->json(['url'=>route('applications.job-orientation',['applicant_id'=>$id])]);
        }else{
            return redirect()->route('applications.procedure',['applicant_id'=>$id]);
        }
    }
}
