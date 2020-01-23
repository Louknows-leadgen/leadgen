<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;

class CollegesController extends Controller
{
    //
    public function create(Request $request){
    	$idx = $request->id;

    	return view('college.new', compact('idx'));
    }

    public function edit($college_id){
        $college = College::findOrFail($college_id);
        return view('college.edit', compact('college'));
    }

    public function update(Request $request, $college_id){
        $college = College::findOrFail($college_id);
        $college->update($request->obj);
        return view('college.show', compact('college'));
    }

    public function show($college_id){
    	$college = College::findOrFail($college_id);
        return view('college.show', compact('college'));
    }

    public function more($person_id){
        return view('college.more',compact('person_id'));
    }

    public function store(Request $request){
        $college = College::create($request->obj);
        return view('college.show',compact('college'));
    }

    public function destroy($college_id){
        $college = College::findOrFail($college_id);
        $college->delete();
    }
}
