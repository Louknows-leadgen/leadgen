<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
    		[
    			'roleid'=>1,
    			'name'=>'Guest',
    			'description'=>'Can only view the application form',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'roleid'=>2,
    			'name'=>'Hiring Staff',
    			'description'=>'Can view the Resource and Training Rooster page',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'roleid'=>3,
    			'name'=>'Interviewer',
    			'description'=>'Can only view the Candidate page',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		]
    	]);
    }
}
