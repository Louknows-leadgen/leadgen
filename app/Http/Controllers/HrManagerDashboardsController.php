<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
