<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\CheckEmployeeExists;
use App\Models\Cluster;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Person;
use App\Models\Spouse;
use App\Models\EmergencyContact;
use App\Models\Dependent;
use App\Models\MiddleSchool;
use App\Models\College;
use App\Models\WorkExperience;
use App\Models\CostCenter;
use App\Models\Site;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Department;
use App\Models\Job;
use App\Models\Tax;
use App\Models\Compensation;


class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:4');
    }
    
    //
    public function create($applicant_id){
    	$clusters = Cluster::all()->sortBy('cluster_name');
        $contracts = Contract::all()->sortBy('contract_name');
    	$employees = Employee::all_employees_name();
    	$cost_centers = CostCenter::all()->sortBy('cost_name');
    	$sites = Site::all()->sortBy('name');
    	$companies = Company::all()->sortBy('cost_name');
    	$departments = Department::all()->sortBy('department_name');
    	$applicant = Applicant::find($applicant_id);
    	
    	return view('employee.create',compact('clusters','contracts','employees','cost_centers','sites','companies','departments','applicant'));
    }

    public function store(Request $request){

    	$validator = Validator::make($request->all(),[
            'person_id' => 'unique:employees,person_id',
    		'cluster_name' => 'nullable|exists:clusters,cluster_name',
    		'contract_name' => 'nullable|exists:contracts,contract_name',
    		'supervisor' => new CheckEmployeeExists,
    		'date_signed' => 'nullable|date_format:m/d/Y',
    		'nesting_date' => 'nullable|date_format:m/d/Y',
    		'eval_period' => 'nullable|date_format:m/d/Y',
    		'reprofile_date' => 'nullable|date_format:m/d/Y',
    		'trng_ext_date' => 'nullable|date_format:m/d/Y',
    		'start_date' => 'required|date_format:m/d/Y',
    		'month_eval3' => 'nullable|date_format:m/d/Y',
    		'month_eval5' => 'nullable|date_format:m/d/Y',
    		'assoc_date' => 'nullable|date_format:m/d/Y',
    		'consultant_date' => 'nullable|date_format:m/d/Y',
    		'regularize_date' => 'nullable|date_format:m/d/Y'
    	],[
    		'cluster_name.exists' => 'Cannot find this cluster',
    		'contract_name.exists' => 'Cannot find this contract',
            'person_id.unique' => 'This applicant already exists'
    	]);

    	if($validator->passes()){
    		$cluster = Cluster::where('cluster_name','=',$request->cluster_name)->first();
    		$contract = Contract::where('contract_name','=',$request->contract_name)->first();
    		$employee_id = Employee::get_employee_id($request->supervisor);
    		$status = 'active';
    		$employee_number = Employee::generate_id($request->start_date);

    		if(isset($cluster))
    			$request->request->add(['cluster_id' => $cluster->id]);
    		if(isset($contract))
    			$request->request->add(['contract_id' => $contract->id]);

    		$request->request->add([
    			'employee_id' => $employee_id,
    			'status' => $status,
    			'company_number' => $employee_number
    		]);

    		$new_employee = Employee::create($request->all());
            if($new_employee){
                // update the application status to hired
                $applicant = Applicant::where('person_id','=',$request->person_id)->first();
                $applicant->application_status_id = application_status('H');
                $applicant->save();
            }

            return response()->json(['success'=>'Added new records.','id'=>$new_employee->id]);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }
    }

    public function show($employee_id){
        $clusters = Cluster::all()->sortBy('cluster_name');
        $employee = Employee::find($employee_id);
        $cost_centers = CostCenter::all()->sortBy('cost_name');
        $sites = Site::all()->sortBy('name');
        $contracts = Contract::all()->sortBy('contract_name');
        $departments = Department::all()->sortBy('department_name');
        $companies = Company::all()->sortBy('cost_name');
        $employees = Employee::all_employees_name();
        $gov_detail = $employee->government_detail;
        $tax_codes = Tax::all()->sortBy('tax_name');
        $compensation = Compensation::where('employee_id','=',$employee_id)->first();

    	return view('employee.show',compact('employee','cost_centers','sites','contracts','departments','employees','companies','clusters','gov_detail','tax_codes', 'compensation'));
    }

    public function update($employee_id, Request $request){
        $validator = Validator::make($request->all(),[
            'cluster_name' => 'nullable|exists:clusters,cluster_name',
            'contract_name' => 'nullable|exists:contracts,contract_name',
            'supervisor' => new CheckEmployeeExists,
            'date_signed' => 'nullable|date_format:m/d/Y',
            'nesting_date' => 'nullable|date_format:m/d/Y',
            'eval_period' => 'nullable|date_format:m/d/Y',
            'reprofile_date' => 'nullable|date_format:m/d/Y',
            'trng_ext_date' => 'nullable|date_format:m/d/Y',
            'start_date' => 'required|date_format:m/d/Y',
            'month_eval3' => 'nullable|date_format:m/d/Y',
            'month_eval5' => 'nullable|date_format:m/d/Y',
            'assoc_date' => 'nullable|date_format:m/d/Y',
            'consultant_date' => 'nullable|date_format:m/d/Y',
            'regularize_date' => 'nullable|date_format:m/d/Y'
        ],[
            'cluster_name.exists' => 'Cannot find this cluster',
            'contract_name.exists' => 'Cannot find this contract',
            'person_id.unique' => 'This applicant already exists'
        ]);

        if($validator->passes()){
            $cluster = Cluster::where('cluster_name','=',$request->cluster_name)->first();
            $contract = Contract::where('contract_name','=',$request->contract_name)->first();
            $eid = Employee::get_employee_id($request->supervisor);

            if(isset($cluster))
                $request->request->add(['cluster_id' => $cluster->id]);
            if(isset($contract))
                $request->request->add(['contract_id' => $contract->id]);
            if(isset($eid))
                $request->request->add(['employee_id' => $eid]);

            $employee = Employee::find($employee_id);
            $employee->update($request->all());

            return response()->json(['success'=>'Record has been updated']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

    }

    public function update_hmo($employee_id, Request $request){
        $validator = Validator::make($request->all(),[
            'medilink_id' => 'required'
        ]);

        if($validator->passes()){
            $employee = Employee::find($employee_id);
            $employee->medilink_id = $request->medilink_id;
            $employee->save();

            return response()->json(['success'=>'Success! Record has been updated']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }


    }

    public function active(){
        $status = 'active';
        $employees = Employee::where('status','=','active')->paginate(5);
        $departments = Department::all()->sortBy('department_name');

        return view('employee.list.active',compact('employees','departments','status'));
    }

    public function inactive(){
        $status = 'inactive';
        $employees = Employee::where('status','=','inactive')->paginate(5);
        $departments = Department::all()->sortBy('department_name');

        return view('employee.list.inactive',compact('employees','departments','status'));
    }

    public function search(Request $request){
        $departments = Department::all()->sortBy('department_name');
        $skey = $request->skey;
        $dept_filter = $request->dept_filter;
        $scope = $request->scope;
        $employees = Employee::search($skey, $dept_filter, $scope);

        if($request->ajax())
            return view('employee.list.search-result',compact('employees','skey','dept_filter','scope'));

        return view('employee.list.search-page',compact('employees','skey','dept_filter','departments','scope'));
    }

    public function employee_details($employee_id){
        $employee = Employee::find($employee_id);
        $person = $employee->person;
        $spouses = $person->spouses;
        $contacts = $person->emergency_contacts;
        $dependents = $person->dependents;
        $elem = $person->elem();
        $high = $person->high();
        $colleges = $person->colleges;
        $works = $person->work_experiences;

        return view('employee.personal_details.show',compact(
            'employee',
            'person',
            'spouses',
            'contacts',
            'dependents',
            'elem',
            'high',
            'colleges',
            'works'
        ));
    }

    public function update_basic(Request $request){

        $validator = Validator::make($request->all(),[
            'age' => 'required|numeric',
            'birthday' => 'required|date_format:m/d/Y', 
            'city_address' => 'required|string',
            'civil_status' => 'required',
            'email' => 'required|email',           
            'first_name' => 'required',
            'father_name' => 'nullable',
            'gender' => 'required',
            'height' => 'nullable|numeric',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'mobile_1' => 'required|numeric',
            'mobile_2' => 'nullable|numeric',
            'mother_name' => 'nullable',
            'province_address' => 'nullable|string',
            'religion' => 'nullable',
            'suffix_name' => 'nullable',
            'weight' => 'nullable|numeric'   
        ]);

        if($validator->passes()){
            $person = Employee::find($request->employee_id)->person;
            $validated = $validator->validate(); // returns all fields validated
            $person->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_spouse(Request $request){

        $validator = Validator::make($request->all(),[
            'address' => 'nullable',
            'birthday' => 'nullable|date_format:m/d/Y',
            'contact_no' => array('nullable','regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'first_name' => 'required|regex:/^[A-z ]+$/',
            'last_name' => 'required|regex:/^[A-z ]+$/',
            'middle_name' => 'nullable|regex:/^[A-z ]+$/',
            'occupation' => 'nullable'  
        ]);

        if($validator->passes()){
            $spouse = Spouse::find($request->spouse_id);
            $validated = $validator->validate(); // returns all fields validated
            $spouse->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_contact(Request $request){

        $validator = Validator::make($request->all(),[
            'address' => 'nullable',
            'contact_no' => array('required', 'regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'full_name' => 'required',
            'relationship' => 'required'
        ],[
            'full_name.required' => 'Name is required.',
            'contact_no.required' => 'Contact number is required.',
            'contact_no.regex' => 'Invalid contact number.',
            'relationship.required' => 'Relationship is required.',
        ]);

        if($validator->passes()){
            $contact = EmergencyContact::find($request->contact_id);
            $validated = $validator->validate(); // returns all fields validated
            $contact->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_dependent(Request $request){

        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'birthday' => 'required|date_format:m/d/Y',
        ],[
            'full_name.required' => 'Name is required.',
            'birthday.required' => 'Birthday is required.',
            'birthday.date_format' => 'Invalid date format.'
        ]);

        if($validator->passes()){
            $dependent = Dependent::find($request->dependent_id);
            $validated = $validator->validate(); // returns all fields validated
            $dependent->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_work(Request $request){

        $validator = Validator::make($request->all(),[
            'employer' => 'required',
            'end_date' => 'required|date_format:m/d/Y|after:start_date',
            'role_desc' => 'nullable',
            'role_name' => 'required',
            'start_date' => 'required|date_format:m/d/Y|before:end_date'
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

        if($validator->passes()){
            $work = WorkExperience::find($request->work_id);
            $validated = $validator->validate(); // returns all fields validated
            $work->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_school(Request $request){

        $validator = Validator::make($request->all(),[
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',            
            'school_name' => 'required'
        ],[
            'graduated_date.required' => 'Year graduated is required',
            'graduated_date.numeric' => 'Wrong year format',
            'graduated_date.regex' => 'Wrong year format'
        ]);

        if($validator->passes()){
            $work = MiddleSchool::find($request->school_id);
            $validated = $validator->validate(); // returns all fields validated
            $work->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function update_college(Request $request){

        $validator = Validator::make($request->all(),[
            'degree' => 'required',            
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
            'school_name' => 'required'
        ],[
            'graduated_date.required' => 'Year graduated is required',
            'graduated_date.numeric' => 'Wrong year format',
            'graduated_date.regex' => 'Wrong year format'
        ]);

        if($validator->passes()){
            $work = College::find($request->college_id);
            $validated = $validator->validate(); // returns all fields validated
            $work->update($validated);
            return response()->json(['success'=>'Success!']);
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function create_spouse(Request $request){
        $validator = Validator::make($request->all(),[
            'address' => 'nullable',
            'birthday' => 'nullable|date_format:m/d/Y',
            'contact_no' => array('nullable','regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'first_name' => 'required|regex:/^[A-z ]+$/',
            'last_name' => 'required|regex:/^[A-z ]+$/',
            'middle_name' => 'nullable|regex:/^[A-z ]+$/',
            'occupation' => 'nullable'  
        ]);

        if($validator->passes()){
            $employee = Employee::find($request->employee_id);
            $validated = $validator->validate(); // returns all fields validated
            $spouse = $employee->person->spouses()->create($validated);
            return view('employee.personal_details.forms.form_spouse',compact('spouse'));
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function create_contact(Request $request){
        $validator = Validator::make($request->all(),[
            'address' => 'nullable',
            'contact_no' => array('sometimes','required', 'regex:/[0-9]+|[0-9]+-[0-9]+/'),            
            'full_name' => 'sometimes|required',
            'relationship' => 'sometimes|required' 
        ]);

        if($validator->passes()){
            $employee = Employee::find($request->employee_id);
            $validated = $validator->validate(); // returns all fields validated
            $contact = $employee->person->emergency_contacts()->create($validated);
            return view('employee.personal_details.forms.form_contact',compact('contact'));
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function create_dependent(Request $request){
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'birthday' => 'required|date_format:m/d/Y',
        ],[
            'full_name.required' => 'Name is required.',
            'birthday.required' => 'Birthday is required.',
            'birthday.date_format' => 'Invalid date format.'
        ]);

        if($validator->passes()){
            $employee = Employee::find($request->employee_id);
            $validated = $validator->validate(); // returns all fields validated
            $dependent = $employee->person->dependents()->create($validated);
            return view('employee.personal_details.forms.form_dependent',compact('dependent'));
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function create_college(Request $request){
        $validator = Validator::make($request->all(),[
            'degree' => 'required',            
            'graduated_date' => 'required|numeric|regex:/^\d{4}$/',
            'school_name' => 'required'
        ],[
            'graduated_date.required' => 'Year graduated is required',
            'graduated_date.numeric' => 'Wrong year format',
            'graduated_date.regex' => 'Wrong year format'
        ]);

        if($validator->passes()){
            $employee = Employee::find($request->employee_id);
            $validated = $validator->validate(); // returns all fields validated
            $college = $employee->person->colleges()->create($validated);
            return view('employee.personal_details.forms.form_college',compact('college'));
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }

    public function create_work(Request $request){
        $validator = Validator::make($request->all(),[
            'employer' => 'required',
            'end_date' => 'required|date_format:m/d/Y|after:start_date',
            'role_desc' => 'nullable',
            'role_name' => 'required',
            'start_date' => 'required|date_format:m/d/Y|before:end_date'
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

        if($validator->passes()){
            $employee = Employee::find($request->employee_id);
            $validated = $validator->validate(); // returns all fields validated
            $work = $employee->person->work_experiences()->create($validated);
            return view('employee.personal_details.forms.form_work',compact('work'));
        }else{
            return response()->json(['errors'=>$validator->getMessageBag()->toArray(),'alert'=>'Failed!']);
        }
    }
}
