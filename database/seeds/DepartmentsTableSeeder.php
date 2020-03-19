<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = [
        	'Operations',
        	'Information Technology',
        	'Facilities',
        	'Marketing',
        	'Quality Control',
        	'Human Resources'
        ];

        foreach ($departments as $department) {
        	$dept = new Department;
        	$dept->department_name = $department;
        	$dept->save();
        }
    }
}
