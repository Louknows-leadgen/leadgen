<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HrManagerDashboardsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:4');
    }

    public function index(){
    	return view('hrmanager_dashboard.index');
    }

    public function employees(){
    	$employees = Employee::with('person')->paginate(5);
    	return view('hrmanager_dashboard.employees',compact('employees'));
    }
}
