<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function create(){
    	return view('employee.create');
    }
}
