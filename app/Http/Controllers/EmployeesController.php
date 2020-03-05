<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;

class EmployeesController extends Controller
{
    //
    public function create(){
    	$clusters = Cluster::all();
    	return view('employee.create',compact('clusters'));
    }
}
