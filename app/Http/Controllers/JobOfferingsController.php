<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\JobOffering;

class JobOfferingsController extends Controller
{
    //
    public function index(){
	    $applicants = Applicant::with(['person','job'])->where('application_status_id','=',7)->paginate(5);
		return view('job_offer.index',compact('applicants'));
	}

	public function search(Request $request){
        $applicants = JobOffering::search($request->skey);
        $skey = $request->skey;

        if($request->ajax())
            return view('job_offer.search-result',compact('applicants','skey'));

        return view('job_offer.search-page',compact('applicants','skey'));
    }
}
