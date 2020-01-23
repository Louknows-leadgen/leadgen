<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\MiddleSchool;

class EducationsController extends Controller
{
    //
    public function list($person_id){
    	$person = Person::find($person_id);
    	$elem = $person->elem();
    	$high = $person->high();
    	$colleges = $person->colleges;

    	return view('education.list',compact('elem','high','colleges','person_id'));
    }

    public function edit($edu_id){
        $education = MiddleSchool::findOrFail($edu_id);
        if($education->education_type == 1)
        	return view('education.elementary.edit')->with('elem',$education);
        else
        	return view('education.high.edit')->with('high',$education);
    }

    public function update(Request $request, $edu_id){
        $education = MiddleSchool::findOrFail($edu_id);
        $education->update($request->obj);
        if($education->education_type == 1)
        	return view('education.elementary.show')->with('elem',$education);
        else
        	return view('education.high.show')->with('high',$education);
    }

    public function show($edu_id){
    	$education = MiddleSchool::findOrFail($edu_id);
        if($education->education_type == 1)
        	return view('education.elementary.show')->with('elem',$education);
        else
        	return view('education.high.show')->with('high',$education);
    }
}
