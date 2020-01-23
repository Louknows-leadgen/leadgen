<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tests')->insert([
    		[
    			'name'=>'Typing Speed',
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Comprehension Test',
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		]
    	]);
    }
}
