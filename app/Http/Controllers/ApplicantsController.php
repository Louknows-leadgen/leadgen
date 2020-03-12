<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Person;
use App\Models\Job;
use App\Models\Site;
use App\Models\ApplicationStatus;
use Session;


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
        $app_statuses = ApplicationStatus::all()->sortBy('name');
        $applicants = Applicant::with('person')->orderBy('id','desc')->paginate(5);
    	return view('applicant.index',compact('applicants','app_statuses'));
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
            'application_status_id' => application_status('IS') // 1 is the status of initial screening
        ]);

        //return redirect()->route('root');
        return redirect()->route('person.notification');
    }

    public function update($applicant_id, Request $request){
        $applicant = Applicant::find($applicant_id);
        
        $applicant->update($request->all());

        $name = $applicant->person->name();
        Session::flash('success',"$name was tagged as no show");
    }

    public function search(Request $request){
        $persons = Applicant::search($request->skey, $request->stat_filter);
        $app_statuses = ApplicationStatus::all()->sortBy('name');
        $skey = $request->skey;
        $stat_filter = $request->stat_filter;

        if($request->ajax())
            return view('applicant.search-result',compact('persons','skey','stat_filter'));

        return view('applicant.search-page',compact('persons','skey','stat_filter','app_statuses'));
    }

    public function decline_offer($applicant_id){
        $applicant = Applicant::find($applicant_id);
        $name = $applicant->person->name();
        $applicant->application_status_id = application_status('DO'); // Decline Offer
        $applicant->save();
        Session::flash('success',"$name was tagged as declined offer");
    }

}
