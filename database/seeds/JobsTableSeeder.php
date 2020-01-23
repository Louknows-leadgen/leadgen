<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('jobs')->insert([
    		[
    			'name'=>'Non-voice Full time',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Non-voice Part time',
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Voice Full time',
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		]
    	]);
    }
}
