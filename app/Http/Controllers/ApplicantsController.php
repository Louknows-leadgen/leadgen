<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Person;
use App\Job;
use App\Site;
use App\ApplicationStatus;


class ApplicantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // root route
    public function index(){
    	$applicants = Applicant::all();
    	return view('applicant.index',compact('applicants'));
    }

    // new applicant form
    public function create($person_id){
        $jobs = Job::all();
        $sites = Site::all();
    	return view('applicant.new',compact('person_id','jobs','sites'));
    }

    public function store(Request $request){
        $person = Person::find($request->person_id);
        $person->applicant()->create([
            'job_id' => $request->job_id,
            'applied_site' => $request->applied_site,
            'referror' => $request->referror,
            'application_status_id' => 1 // 1 is the status of initial screening
        ]);

        //return redirect()->route('root');
        return redirect()->route('person.notification');
    }

    public function show(Applicant $applicant){
        $person = $applicant->person;

        return view('applicant.show',compact('person'));
    }

    public function search(Request $request){
        $persons = Applicant::search($request->skey);

        return view('applicant.search',compact('persons'));
    }

}
