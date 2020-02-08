<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Person;
use App\Models\Job;
use App\Models\Site;
use App\Models\ApplicationStatus;


class ApplicantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:2')->only('index');
    }
    
    // root route
    public function index(){
        //$applicants = Applicant::with('person')->get();
        $applicants = Applicant::with('person')->paginate(5);
    	return view('applicant.index',compact('applicants'));
    }

    // new applicant form
    public function create($person_id){
        $jobs = Job::all();
        $sites = Site::all();
    	return view('applicant.new',compact('person_id','jobs','sites'));
    }

    public function store(Request $request){
        $request->validate(['person_id' => 'unique:applicants'],['The applicant already exists.']);

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

    public function search(Request $request){
        $persons = Applicant::search($request->skey);
        $skey = $request->skey;

        if($request->ajax())
            return view('applicant.search-result',compact('persons','skey'));

        return view('applicant.search-page',compact('persons','skey'));
    }

}
