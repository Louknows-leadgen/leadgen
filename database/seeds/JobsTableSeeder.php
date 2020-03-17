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
    			'name'=>'Account Manager',
                'department_id'=>1
    		 	'created_at'=>Carbon::now(), 
    		 	'updated_at'=>Carbon::now()
    		],
            [
                'name'=>'Site Manager',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Floor Manager',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Senior Team Lead',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Junior Team Lead',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Subject Matter Expert',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Hybrid Agent',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Non Voice Agent',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Voice Agent',
                'department_id'=>1
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Senior IT Manager',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Junior IT Manager',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'IT Supervisor',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Vicidial Manager',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Network Specialist',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Senior IT Specialist',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'IT Specialist',
                'department_id'=>2
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Facilities Manager',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Security',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Procurement Officer',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Inventory and Equipment Maintenance',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Janitorial Services',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Custodian',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Employer Services',
                'department_id'=>3
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Company Liaison',
                'department_id'=>4
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'PR Manager',
                'department_id'=>4
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'QA Manager',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'QA Supervisor',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Senior Analyst',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Junior Analyst',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Quality Auditors',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Document Controller',
                'department_id'=>5
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'HR Manager',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'HR Junior Manager',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'HR Generalist',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Recruitment Specialist',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Accounting',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Bookkeeping',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Compensation and Benefit Officer',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Employee Relations Officer',
                'department_id'=>6
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ]
    	]);
    }
}
