<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Person;
use App\Spouse;
use App\EmergencyContact;
use App\Dependent;
use App\MiddleSchool;
use App\College;
use App\WorkExperience;

class ResourceDetailsController extends Controller
{
    /*
    |----------------------------------
    |        Index page. 
    |        Default tab is Basic info
    |----------------------------------
    */
    public function index($person_id){
    	$person = Person::find($person_id);
    	return view('resource_detail.index',compact('person'));
    }

    /*
    |----------------------------------
    |        Basic Info tab
    |----------------------------------
    */
    public function edit_person($person_id){
    	$person = Person::find($person_id);
    	return view('resource_detail._basic_info.edit',compact('person'));
    }

    public function update_person($person_id, Request $request){

    	$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'mobile_1' => 'required|numeric',
            'mobile_2' => 'nullable|numeric',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'birthday' => 'required|date_format:m/d/Y',
            'city_address' => 'required|string'
        ],[
            'first_name.required' => 'First name is required.',
            'middle_name.required' => 'Middle name is required.',
            'last_name.required' => 'Last name is required.',
            'mobile_1.required' => 'Mobile number is required.',
            'mobile_1.numeric' => 'Mobile number should be numeric.',
            'mobile_2.numeric' => 'Mobile number should be numeric.',
            'email.required' => 'Email is required.',
            'email.email' => 'Wrong email format.',
            'age' => 'required|numeric.',
            'birthday.required' => 'Birthday is required.',
            'birthday.date_format' => 'Wrong date format.',
            'city_address.required' => 'City address is required.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

    	$person = Person::find($person_id);
    	$person->update($request->all());

    	if($request->ajax()){
            return response()->json(['url'=>route('rd.show_person',['person_id'=>$person->id])]);
        }

        return view('resource_detail._basic_info.show',compact('person'));
    }

    public function show_person($person_id){
    	$person = Person::find($person_id);
    	return view('resource_detail._basic_info.show',compact('person'));
    }

    /*
    |----------------------------------
    |       Spouses tab
    |----------------------------------
    */
    
    public function destroy_spouse($spouse_id){
        $spouse = Spouse::find($spouse_id);
        $spouse->delete();
    }

    public function new_spouse(Request $request){
        $person_id = $request->person_id;
        return view('resource_detail._spouse.new_spouse',compact('person_id'));
    }

    public function store_spouse(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[A-z ]+$/',
            'middle_name' => 'nullable|regex:/^[A-z ]+$/',
            'last_name' => 'required|regex:/^[A-z ]+$/',
            'birthday' => 'nullable|date_format:m/d/Y',
            'contact_no' => array('nullable','regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
        ],[
            'first_name.required' => 'First name is required.',
            'first_name.regex' => 'First name should contain letters only.',
            'middle_name.regex' => 'Middle name should contain letters only.',
            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'Last name should contain letters only.',
            'birthday.date_format' => 'Invalid date format.',
            'contact_no.regex' => 'Invalid contact number.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $spouse = Spouse::create($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_spouse',['spouse_id'=>$spouse->id])]);
        }
    }

    public function show_spouses($person_id){
        $person = Person::find($person_id);
        $spouses = $person->spouses;

        return view('resource_detail._spouse.show',compact('spouses','person'));
    }

    public function edit_spouse($spouse_id){
        $spouse = Spouse::find($spouse_id);

        return view('resource_detail._spouse.edit',compact('spouse'));
    }

    public function update_spouse($spouse_id, Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[A-z ]+$/',
            'middle_name' => 'nullable|regex:/^[A-z ]+$/',
            'last_name' => 'required|regex:/^[A-z ]+$/',
            'birthday' => 'nullable|date_format:m/d/Y',
            'contact_no' => array('nullable','regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
        ],[
            'first_name.required' => 'First name is required.',
            'first_name.regex' => 'First name should contain letters only.',
            'middle_name.regex' => 'Middle name should contain letters only.',
            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'Last name should contain letters only.',
            'birthday.date_format' => 'Invalid date format.',
            'contact_no.regex' => 'Invalid contact number.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $spouse = Spouse::find($spouse_id);
        $spouse->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_spouse',['spouse_id'=>$spouse->id])]);
        }

        return view('resource_detail._spouse.show_spouse',compact('spouse'));
    }

    public function show_spouse($spouse_id){
        $spouse = Spouse::find($spouse_id);

        return view('resource_detail._spouse.show_spouse',compact('spouse'));
    }


    /*
    |----------------------------------
    |       Emergency Contacts tab
    |----------------------------------
    */

    public function destroy_contact($contact_id){
        $contact = EmergencyContact::find($contact_id);
        $contact->delete();
    }

    public function new_contact(Request $request){
        $person_id = $request->person_id;
        return view('resource_detail._emergency_contact.new_contact',compact('person_id'));
    }

    public function store_contact(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'contact_no' => array('required', 'regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'relationship' => 'required',
        ],[
            'full_name.required' => 'Name is required.',
            'contact_no.required' => 'Contact number is required.',
            'contact_no.regex' => 'Invalid contact number.',
            'relationship.required' => 'Relationship is required.',
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $contact = EmergencyContact::create($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_contact',['contact_id'=>$contact->id])]);
        }
    }

    public function show_contacts($person_id){
        $person = Person::find($person_id);
        $contacts = $person->emergency_contacts;

        return view('resource_detail._emergency_contact.show',compact('contacts','person'));
    }

    public function edit_contact($contact_id){
        $contact = EmergencyContact::find($contact_id);

        return view('resource_detail._emergency_contact.edit',compact('contact'));
    }

    public function update_contact($contact_id, Request $request){

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'contact_no' => array('required', 'regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'relationship' => 'required',
        ],[
            'full_name.required' => 'Name is required.',
            'contact_no.required' => 'Contact number is required.',
            'contact_no.regex' => 'Invalid contact number.',
            'relationship.required' => 'Relationship is required.',
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $contact = EmergencyContact::find($contact_id);
        $contact->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_contact',['contact_id'=>$contact->id])]);
        }

        return view('resource_detail._emergency_contact.show_contact',compact('contact'));
    }

    public function show_contact($contact_id){
        $contact = EmergencyContact::find($contact_id);

        return view('resource_detail._emergency_contact.show_contact',compact('contact'));
    }


    /*
    |----------------------------------
    |       Dependents tab
    |----------------------------------
    */

    public function destroy_dependent($dependent_id){
        $dependent = Dependent::find($dependent_id);
        $dependent->delete();
    }

    public function new_dependent(Request $request){
        $person_id = $request->person_id;
        return view('resource_detail._dependent.new_dependent',compact('person_id'));
    }

    public function store_dependent(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'birthday' => 'required|date_format:m/d/Y',
        ],[
            'full_name.required' => 'Name is required.',
            'birthday.required' => 'Birthday is required.',
            'birthday.date_format' => 'Invalid date format.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $dependent = Dependent::create($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_dependent',['dependent_id'=>$dependent->id])]);
        }
    }

    public function show_dependents($person_id){
        $person = Person::find($person_id);
        $dependents = $person->dependents;

        return view('resource_detail._dependent.show',compact('dependents','person'));
    }

    public function edit_dependent($dependent_id){
        $dependent = Dependent::find($dependent_id);

        return view('resource_detail._dependent.edit',compact('dependent'));
    }

    public function update_dependent($dependent_id, Request $request){

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'birthday' => 'required|date_format:m/d/Y',
        ],[
            'full_name.required' => 'Name is required.',
            'birthday.required' => 'Birthday is required.',
            'birthday.date_format' => 'Invalid date format.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $dependent = Dependent::find($dependent_id);
        $dependent->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_dependent',['dependent_id'=>$dependent->id])]);
        }

        return view('resource_detail._dependent.show_dependent',compact('dependent'));
    }

    public function show_dependent($dependent_id){
        $dependent = Dependent::find($dependent_id);

        return view('resource_detail._dependent.show_dependent',compact('dependent'));
    }


    /*
    |----------------------------------
    |       Educations tab
    |----------------------------------
    */
    public function show_educations($person_id){
        $person = Person::find($person_id);
        $elem = $person->elem();
        $high = $person->high();
        $colleges = $person->colleges;

        return view('resource_detail._education.show',compact('elem','high','colleges','person'));
    }

    public function edit_elementary($elem_id){
        $elem = MiddleSchool::find($elem_id);

        return view('resource_detail._education._elementary.edit',compact('elem'));
    }

    public function update_elementary($elem_id, Request $request){

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
        ],[
            'school_name.required' => 'School name is required.',
            'graduated_date.required' => 'Graduated date is required.',
            'graduated_date.numeric' => 'Invalid year format.',
            'graduated_date.regex' => 'Invalid year format.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $elem = MiddleSchool::find($elem_id);
        $elem->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_elementary',['elem_id'=>$elem->id])]);
        }

        return view('resource_detail._education._elementary.show',compact('elem'));
    }

    public function show_elementary($elem_id){
        $elem = MiddleSchool::find($elem_id);

        return view('resource_detail._education._elementary.show',compact('elem'));
    }

    public function edit_high($high_id){
        $high = MiddleSchool::find($high_id);

        return view('resource_detail._education._high.edit',compact('high'));
    }

    public function update_high($high_id, Request $request){

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
        ],[
            'school_name.required' => 'School name is required.',
            'graduated_date.required' => 'Graduated date is required.',
            'graduated_date.numeric' => 'Invalid year format.',
            'graduated_date.regex' => 'Invalid year format.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $high = MiddleSchool::find($high_id);
        $high->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_high',['high_id'=>$high->id])]);
        }

        return view('resource_detail._education._high.show',compact('high'));
    }

    public function show_high($high_id){
        $high = MiddleSchool::find($high_id);

        return view('resource_detail._education._high.show',compact('high'));
    }

    public function destroy_college($college_id){
        $college = College::find($college_id);
        $college->delete();
    }

    public function new_college(Request $request){
        $person_id = $request->person_id;
        return view('resource_detail._education._college.new_college',compact('person_id'));
    }

    public function store_college(Request $request){
        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
            'degree' => 'required'
        ],[
            'school_name.required' => 'School name is required.',
            'graduated_date.required' => 'Graduated date is required.',
            'graduated_date.numeric' => 'Invalid year format.',
            'graduated_date.regex' => 'Invalid year format.',
            'degree.required' => 'Degree is required.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $college = College::create($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_college',['college_id'=>$college->id])]);
        }
    }

    public function edit_college($college_id){
        $college = College::find($college_id);

        return view('resource_detail._education._college.edit',compact('college'));
    }

    public function update_college($college_id, Request $request){

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
            'degree' => 'required'
        ],[
            'school_name.required' => 'School name is required.',
            'graduated_date.required' => 'Graduated date is required.',
            'graduated_date.numeric' => 'Invalid year format.',
            'graduated_date.regex' => 'Invalid year format.',
            'degree.required' => 'Degree is required.'
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $college = College::find($college_id);
        $college->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_college',['college_id'=>$college->id])]);
        }

        return view('resource_detail._education._college.show_college',compact('college'));
    }

    public function show_college($college_id){
        $college = College::find($college_id);

        return view('resource_detail._education._college.show_college',compact('college'));
    }


    /*
    |----------------------------------
    |       Work Experiences tab
    |----------------------------------
    */

    public function destroy_work($work_id){
        $work = WorkExperience::find($work_id);
        $work->delete();
    }

    public function new_work(Request $request){
        $person_id = $request->person_id;
        return view('resource_detail._work.new_work',compact('person_id'));
    }

    public function store_work(Request $request){
        $validator = Validator::make($request->all(), [
            'employer' => 'required',
            'role_name' => 'required',
            'start_date' => 'required|date_format:m/d/Y|before:end_date',
            'end_date' => 'required|date_format:m/d/Y|after:start_date',
        ],[
            'employer.required' => 'Employer is required.',
            'role_name.required' => 'Role is required.',
            'start_date.required' => 'Start date is required.',
            'start_date.date_format' => 'Invalid date format.',
            'start_date.before' => 'Start date must be before End date.',
            'end_date.required' => 'End date is required.',
            'end_date.date_format' => 'Invalid date format.',
            'end_date.after' => 'End date must be after Start date.',
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $work = WorkExperience::create($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_work',['work_id'=>$work->id])]);
        }
    }

    public function show_works($person_id){
        $person = Person::find($person_id);
        $works = $person->work_experiences;

        return view('resource_detail._work.show',compact('works','person'));
    }

    public function edit_work($work_id){
        $work = WorkExperience::find($work_id);

        return view('resource_detail._work.edit',compact('work'));
    }

    public function update_work($work_id, Request $request){

        $validator = Validator::make($request->all(), [
            'employer' => 'required',
            'role_name' => 'required',
            'start_date' => 'required|date_format:m/d/Y|before:end_date',
            'end_date' => 'required|date_format:m/d/Y|after:start_date',
        ],[
            'employer.required' => 'Employer is required.',
            'role_name.required' => 'Role is required.',
            'start_date.required' => 'Start date is required.',
            'start_date.date_format' => 'Invalid date format.',
            'start_date.before' => 'Start date must be before End date.',
            'end_date.required' => 'End date is required.',
            'end_date.date_format' => 'Invalid date format.',
            'end_date.after' => 'End date must be after Start date.',
        ]);

        if ($validator->fails()){
            if($request->ajax())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $work = WorkExperience::find($work_id);
        $work->update($request->all());

        if($request->ajax()){
            return response()->json(['url'=>route('rd.show_work',['work_id'=>$work->id])]);
        }

        return view('resource_detail._work.show_work',compact('work'));
    }

    public function show_work($work_id){
        $work = WorkExperience::find($work_id);

        return view('resource_detail._work.show_work',compact('work'));
    }
}
