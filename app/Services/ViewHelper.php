<?php

namespace App\Services;

class ViewHelper{
	public static function nav_class($status){
		$className = [];

		switch ($status) {
			case 1:
				$className['init'] = ['title'=>'actv-font','border'=>'actv-border','icon'=>'actv-font'];
				$className['fin'] = ['title'=>'','border'=>'','icon'=>''];
				$className['offer'] = ['title'=>'','border'=>'','icon'=>''];
				break;
			
			case 2:
				$className['init'] = ['title'=>'red-font','border'=>'red-border','icon'=>'red-font'];
				$className['fin'] = ['title'=>'','border'=>'','icon'=>''];
				$className['offer'] = ['title'=>'','border'=>'','icon'=>''];
				break;

			case 3:
			case 4:
				$className['init'] = ['title'=>'','border'=>'green-border','icon'=>'white-font'];
				$className['fin'] = ['title'=>'actv-font','border'=>'actv-border','icon'=>'actv-font'];
				$className['offer'] = ['title'=>'','border'=>'','icon'=>''];
				break;

			case 5:
				$className['init'] = ['title'=>'','border'=>'green-border','icon'=>'white-font'];
				$className['fin'] = ['title'=>'red-font','border'=>'red-border','icon'=>'red-font'];
				$className['offer'] = ['title'=>'','border'=>'','icon'=>''];
				break;

			case 6:
			case 7:
				$className['init'] = ['title'=>'','border'=>'green-border','icon'=>'white-font'];
				$className['fin'] = ['title'=>'','border'=>'green-border','icon'=>'white-font'];
				$className['offer'] = ['title'=>'actv-font','border'=>'actv-border','icon'=>'actv-font'];
				break;
		}

		return $className;
	}
}
