<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonFormRequest;
use App\Models\Person;
use Validator;

class PersonsController extends Controller
{
    
    public function __construct(){
        $this->middleware('checkrole:1')->only('create');
    }

    // show person new form
	public function create(){
		return view('person.main');
	}

    // function that handles showing the form for the person's individual components (spouse/contacts/dependents/colleges/work experience)
    public function new(Request $request, $item){
        $idx = $request->id;

        switch ($item) {
            case 'spouse':
                return view('person._spouse._new', compact('idx'));
                break;
            case 'contact':
                return view('person._emergency-contact._new', compact('idx'));
                break;
            case 'dependent':
                return view('person._dependent._new', compact('idx'));
                break;
            case 'college':
                return view('person._education._new-college', compact('idx'));
                break;
            case 'work':
                return view('person._work-experience._new', compact('idx'));
                break;       
        }
    }

    // create a person and redirect to applicant's create page
    public function store(PersonFormRequest $resource){
        //$this->validate_field($resource);
        //$resource->validated();


        $person = Person::create($resource->person);

        if(isset($resource->spouses))
            foreach ($resource->spouses as $spouse) {
                $person->spouses()->create($spouse);
            }

        if(isset($resource->emergency_contacts))
            foreach ($resource->emergency_contacts as $contact) {
                $person->emergency_contacts()->create($contact);
            }

        if(isset($resource->dependents))
            foreach ($resource->dependents as $dependent) {
                $person->dependents()->create($dependent);
            }

        if(isset($resource->schools))
            foreach ($resource->schools as $school) {
                $person->middle_schools()->create($school);
            }

        if(isset($resource->colleges))
            foreach ($resource->colleges as $college) {
                $person->colleges()->create($college);
            }

        if(isset($resource->work_exp))
            foreach ($resource->work_exp as $work) {
                $person->work_experiences()->create($work);
            }
        
        return redirect()->route('applicants.create' , ['id' => $person->id]);
    }

    public function validate_field(Request $request){
        $messages = $this->validation_messages();
        $validator = Validator::make($request->all(), [
            'person.first_name' => 'sometimes|required',
            'person.middle_name' => 'sometimes|required',
            'person.last_name' => 'sometimes|required',
            'person.mobile_1' => 'sometimes|required|numeric',
            'person.mobile_2' => 'sometimes|nullable|numeric',
            'person.email' => 'sometimes|required|email',
            'person.age' => 'sometimes|required|numeric',
            'person.birthday' => 'sometimes|required|date_format:m/d/Y',
            'person.city_address' => 'sometimes|required|string',
            'person.father_name' => 'sometimes|nullable',
            'person.mother_name' => 'sometimes|nullable',
            'spouses.*.first_name' => 'sometimes|required|regex:/[A-z]+/',
            'spouses.*.middle_name' => 'sometimes|nullable|regex:/[A-z]+/',
            'spouses.*.last_name' => 'sometimes|required|regex:/[A-z]+/',
            'spouses.*.birthday' => 'sometimes|date_format:m/d/Y',
            'spouses.*.contact_no' => array('sometimes','nullable', 'regex:/[0-9]+|[0-9]+-[0-9]+/'),
            'emergency_contacts.*.full_name' => 'sometimes|required',
            'emergency_contacts.*.contact_no' => array('sometimes','required', 'regex:/[0-9]+|[0-9]+-[0-9]+/'),
            'emergency_contacts.*.relationship' => 'sometimes|required',
            'dependents.*.full_name' => 'sometimes|required',
            'dependents.*.birthday' => 'sometimes|required|date_format:m/d/Y',
            'schools.*.school_name' => 'sometimes|required',
            'schools.*.graduated_date' => 'sometimes|required|numeric',
            'work_exp.*.employer' => 'sometimes|required',
            'work_exp.*.role_name' => 'sometimes|required',
            'work_exp.*.start_date' => 'sometimes|required|date_format:m/d/Y',
            'work_exp.*.end_date' => 'sometimes|required|date_format:m/d/Y',
        ],$messages);

        if ($validator->passes()) {
            if($request->ajax())
                return response()->json(['success'=>'Added new records.']);
        }else{
            if($request->ajax())
                return response()->json(['error'=>$validator->errors()->all()]);
            else{
                $validator->validate();
            }
        }

    }

    private function validation_messages(){
        $messages = [
            'required' => 'This field is required.',
            'numeric' => 'This field should only contain numbers.',
            'email' => 'This field should be in email format.',
            'regex' => 'This field should be a string.',
            'spouses.*.contact_no.regex' => 'Should follow the correct format.',
            'emergency_contacts.*.contact_no.regex' => 'Should follow the correct format.',
            'date_format' => 'Date format should be mm/dd/yyyy'
        ];

        return $messages;
    }

}
