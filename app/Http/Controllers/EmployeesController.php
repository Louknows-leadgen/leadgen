<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
