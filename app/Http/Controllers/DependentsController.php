<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Dependent;

class DependentsController extends Controller
{
    //
    public function create(Request $request){
    	$idx = $request->id;

    	return view('dependent.new', compact('idx'));
    }

    public function show($dependent_id){
        $dependent = Dependent::findOrFail($dependent_id);
        return view('dependent.show',compact('dependent'));
    }

    public function list($person_id){
    	$person = Person::find($person_id);
    	$dependents = $person->dependents;

    	return view('dependent.list',compact('dependents','person_id'));
    }

    public function edit($dependent_id){
        $dependent = Dependent::findOrFail($dependent_id);
        return view('dependent.edit',compact('dependent'));
    }

    public function update(Request $request, $dependent_id){
        $dependent = Dependent::findOrFail($dependent_id);
        $dependent->update($request->obj);
        return view('dependent.show',compact('dependent'));
    }

    public function more($person_id){
        return view('dependent.more',compact('person_id'));
    }

    public function store(Request $request){
        $dependent = Dependent::create($request->obj);
        return view('dependent.show',compact('dependent'));
    }

    public function destroy(Dependent $dependent){
        $dependent->delete();
    }
}
