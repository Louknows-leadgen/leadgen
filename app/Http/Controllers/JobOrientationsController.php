<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOrientation;
use App\Applicant;

class JobOrientationsController extends Controller
{
    //
    public function store(Request $request){
    	$id = $request->applicant_id;
    	JobOrientation::create($request->all());
    	Applicant::find($id)->update(['application_status_id'=>7]);

    	return redirect()->route('applications.process',['applicant_id'=>$id, 'status_id'=>7]);
    }

    public function edit($jo_id){
    	$jo = JobOrientation::find($jo_id);

    	return view('application.job_offer.edit',compact('jo'));
    }

    public function update($jo_id, Request $request){
        $jo = JobOrientation::find($jo_id);
        $id = $jo->applicant_id;
        $jo->update($request->all());

        return redirect()->route('applications.process',['applicant_id'=>$id, 'status_id'=>7]); // 4 is the status of Final Interview
    }
}
