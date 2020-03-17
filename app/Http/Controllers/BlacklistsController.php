<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Blacklist;
use App\Models\Applicant;
use App\Models\Employee;

class BlacklistsController extends Controller
{
    //
    public function index(){
    	
    }

    public function hit($applicant_id){
    	$blacklists = hit_profiles($applicant_id);

    	return view('blacklist.hit',compact('blacklists'));
    }

    public function blacklist_applicant($applicant_id){
    	$applicant = Applicant::find($applicant_id);
    	return view('blacklist.blacklist_applicant',compact('applicant'));
    }

    public function blacklist_employee($employee_id){
    	$employee = Employee::find($employee_id);
    	return view('blacklist.blacklist_employee',compact('employee'));
    }

    public function blacklist_applicant_store(Request $request){
    	$validated = $request->validate([
    		'reason' => 'required'
    	]);

    	$person = Applicant::find($request->applicant_id)->person;

    	// retrieve instance if existing, create new instance otherwise
    	$blacklist = Blacklist::firstOrNew(
			    		[
			    			'first_name' => $person->first_name,
			    			'middle_name' => $person->middle_name,
			    		 	'last_name' => $person->first_name,
			    		 	'birthday' => $person->birthday,
			    		 	'gender' => $person->gender
			    		]
			       );    
    	
    	// prepare info to be inserted to the instance created above
    	$blacklist_info = [
    		'first_name' => $person->first_name,
    		'middle_name' => $person->middle_name,
		 	'last_name' => $person->first_name,
		 	'birthday' => $person->birthday,
		 	'gender' => $person->gender,
		 	'city_address' => $person->city_address,
		 	'reason' => $request->reason,
		 	'blacklisted_by' => Auth::user()->name
    	];

    	// insert if not exist or update if the record exist
    	$blacklist->fill($blacklist_info)
    	          ->save();

    	// update the application status to blacklisted
    	$person->applicant->application_status_id = application_status('BL');
    	$person->applicant->save();

    	Session::flash('success','Applicant has been blacklisted');
    	return redirect()->route('job-offerings.index');
    }

    public function blacklist_employee_store(Request $request){
    	$validated = $request->validate([
    		'reason' => 'required'
    	]);

    	$person = Employee::find($request->employee_id)->person;

    	// retrieve instance if existing, create new instance otherwise
    	$blacklist = Blacklist::firstOrNew(
			    		[
			    			'first_name' => $person->first_name,
			    			'middle_name' => $person->middle_name,
			    		 	'last_name' => $person->first_name,
			    		 	'birthday' => $person->birthday,
			    		 	'gender' => $person->gender
			    		]
			       );    
    	
    	// prepare info to be inserted to the instance created above
    	$blacklist_info = [
    		'company_number' => $person->employee->company_number,
    		'first_name' => $person->first_name,
    		'middle_name' => $person->middle_name,
		 	'last_name' => $person->first_name,
		 	'birthday' => $person->birthday,
		 	'gender' => $person->gender,
		 	'city_address' => $person->city_address,
		 	'reason' => $request->reason,
		 	'blacklisted_by' => Auth::user()->name
    	];

    	// insert if not exist or update if the record exist
    	$blacklist->fill($blacklist_info)
    	          ->save();

    	// update the employee status to inactive
    	$person->employee->status = 'inactive';
    	$person->employee->save();

    	Session::flash('success','Employee has been blacklisted');
    	return redirect()->route('employees.active');
    }
}












