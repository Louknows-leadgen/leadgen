<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$user = Auth::user();

    	return view('user.index',compact('user'));
    }

    public function update_email(Request $request){
    	$user = Auth::user();

    	$user->email = $request->email;
    	$user->save();
    	
    	return $request->email;
    }

    public function edit_password(){
    	$user = Auth::user();

    	return view('user.index',compact('user'));
    }

    public function update_password(Request $request){
    	$user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password']
        ],[
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'confirm_password.same' => 'Confirm and new password does not match.'
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

    	
        $user->update(['password'=> Hash::make($request->new_password)]);
    	return response()->json(['success'=>'Password has been updated successfully']);
    }
}
