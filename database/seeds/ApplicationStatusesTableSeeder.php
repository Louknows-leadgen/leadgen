<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicationStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('application_statuses')->insert([
    		[
    			'name'=>'Initial Screening',
                'stat_id'=>1,
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Initial Screening - Failed',
                'stat_id'=>2,
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
    		[
    			'name'=>'Appoint Final Interview',
                'stat_id'=>3,
    			'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
            [
                'name'=>'For Final Interview',
                'stat_id'=>4,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Final Interview - Failed',
                'stat_id'=>5,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Schedule Job Orientation',
                'stat_id'=>6,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'For Job Orientation',
                'stat_id'=>7,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'JO - No Show',
                'stat_id'=>8,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Hired',
                'stat_id'=>9,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Declined Offer',
                'stat_id'=>10,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Final Interview - No Show',
                'stat_id'=>11,
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
    	]);
    }
}
