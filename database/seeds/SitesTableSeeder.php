<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sites')->insert([
    		[
    			'name'=>'Inayawan',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Oakridge Mandaue',
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		]
    	]);
    }
}
