<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PusherNotification;

class PusherNotificationsController extends Controller
{
    //
	public function index(){
		$notifications = PusherNotification::paginate(5);

		return view('pusher_notification.index',compact('notifications'));
	}

	public function destroy($notif_id){
		PusherNotification::destroy($notif_id);
	}
}
