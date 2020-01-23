<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\EmergencyContact;

class EmergencyContactsController extends Controller
{
    //
    public function create(Request $request){
    	$idx = $request->id;

    	return view('emergency_contact.new', compact('idx'));
    }

    public function list($person_id){
    	$person = Person::find($person_id);
    	$contacts = $person->emergency_contacts;

    	return view('emergency_contact.list',compact('contacts','person_id'));
    }

    public function show($contact_id){
        $contact = EmergencyContact::findOrFail($contact_id);
        return view('emergency_contact.show',compact('contact'));
    }

    public function edit($contact_id){
        $contact = EmergencyContact::findOrFail($contact_id);
        return view('emergency_contact.edit',compact('contact'));
    }

    public function update(Request $request, $contact_id){
        $contact = EmergencyContact::findOrFail($contact_id);
        $contact->update($request->obj);
        return view('emergency_contact.show',compact('contact'));
    }

    public function more($person_id){
        return view('emergency_contact.more',compact('person_id'));
    }

    public function store(Request $request){
        $contact = EmergencyContact::create($request->obj);
        return view('emergency_contact.show',compact('contact'));
    }

    public function destroy($contact_id){
        $contact = EmergencyContact::findOrFail($contact_id);
        $contact->delete();
    }
}
