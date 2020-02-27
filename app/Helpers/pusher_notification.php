<?php

use App\Models\PusherNotification;


function notifications(){
	$notif_count = PusherNotification::count();

	return $notif_count;
}