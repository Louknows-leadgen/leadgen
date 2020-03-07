<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\CheckEmployeeExists;
use App\Models\Cluster;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Person;
use App\Models\CostCenter;
use App\Models\Site;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Department;


class EmployeesController extends Controller
{
    //
    public function create($applicant_id){
    	$clusters = Cluster::all()->sortBy('cluster_name');
    	$contracts = Contract::all()->sortBy('contract_name');
    	$employees = Person::all()->sortBy('first_name');
    	$cost_centers = CostCenter::all()->sortBy('cost_name');
    	$sites = Site::all()->sortBy('name');
    	$companies = Company::all()->sortBy('cost_name');
    	$departments = Department::all()->sortBy('department_name');
    	$applicant = Applicant::find($applicant_id);
    	
    	return view('employee.create',compact('clusters','contracts','employees','cost_centers','sites','companies','departments','applicant'));
    }

    public function store(Request $request){

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
    	]);

    	if($validator->passes()){
    		$cluster = Cluster::where('cluster_name','=',$request->cluster_name)->first();
    		$contract = Contract::where('contract_name','=',$request->contract_name)->first();
    		$employee_id = Employee::get_employee_id($request->supervisor);
    		$status = 'Active';
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

            return response()->json(['success'=>'Added new records.','id'=>$new_employee]);
        }else{
            //return response()->json(['errors'=>$validator->errors()->all()]);
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }
    }

    public function show($employee_id){
    	return view('employee.show');
    }
}
