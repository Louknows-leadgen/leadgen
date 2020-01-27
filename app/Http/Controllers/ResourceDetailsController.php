<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Person;

class ResourceDetailsController extends Controller
{
    // the default is person detail
    public function index($person_id){
    	$person = Person::find($person_id);
    	return view('resource_detail.index',compact('person'));
    }

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
            return response()->json(['url'=>route('rd.show_person',['id'=>$person->id])]);
        }

        return view('resource_detail._basic_info.show',compact('person'));
    }

    public function show_person($person_id){
    	$person = Person::find($person_id);
    	return view('resource_detail._basic_info.show',compact('person'));
    }

    // spouses
    public function spouse(){

    }
}
