<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\WorkExperience;

class WorkExperiencesController extends Controller
{
    //
    public function create(Request $request){
    	$idx = $request->id;

    	return view('work_experience.new', compact('idx'));
    }

    public function list($person_id){
    	$person = Person::find($person_id);
    	$works = $person->work_experiences;

    	return view('work_experience.list',compact('works','person_id'));
    }

    public function show($work_id){
        $work = WorkExperience::findOrFail($work_id);
        return view('work_experience.show',compact('work'));
    }

    public function edit($work_id){
        $work = WorkExperience::findOrFail($work_id);
        return view('work_experience.edit',compact('work'));
    }

    public function update(Request $request, $work_id){
        $work = WorkExperience::findOrFail($work_id);
        $work->update($request->obj);
        return view('work_experience.show',compact('work'));
    }

    public function more($person_id){
        return view('work_experience.more',compact('person_id'));
    }

    public function store(Request $request){
        $work = WorkExperience::create($request->obj);
        return view('work_experience.show',compact('work'));
    }

    public function destroy($work_id){
        $work = WorkExperience::findOrFail($work_id);
        $work->delete();
    }
}
