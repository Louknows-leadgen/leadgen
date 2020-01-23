<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Spouse;

class SpousesController extends Controller
{
    //

    public function list($person_id){
    	$person = Person::find($person_id);
    	$spouses = $person->spouses;

    	return view('spouse.list',compact('spouses','person_id'));
    }

    public function show($spouse_id){
        $spouse = Spouse::findOrFail($spouse_id);
        return view('spouse.show',compact('spouse'));
    }

    public function edit($spouse_id){
        $spouse = Spouse::findOrFail($spouse_id);
        return view('spouse.edit',compact('spouse'));
    }

    public function update(Request $request, $spouse_id){
        $spouse = Spouse::findOrFail($spouse_id);
        $spouse->update($request->obj);
        return view('spouse.show',compact('spouse'));
    }

    public function more($person_id){
        return view('spouse.more',compact('person_id'));
    }

    public function store(Request $request){
        $spouse = Spouse::create($request->obj);
        return view('spouse.show',compact('spouse'));
    }

    public function destroy(Spouse $spouse){
        $spouse->delete();
    }
}
