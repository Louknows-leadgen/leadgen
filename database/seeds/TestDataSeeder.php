<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Person;
use App\Models\MiddleSchool;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add new Users
    	$user1 = new User;
    	$user1->username = 'interviewer1';
    	$user1->email = 'lourencejohn@digicononline.com';
    	$user1->roleid = 3;
    	$user1->first_name = 'interviewer';
    	$user1->last_name = '1';
    	$user1->password = Hash::make('Lcabalun0300');
    	$user1->save();

    	$user2 = new User;
    	$user2->username = 'interviewer2';
    	$user2->email = 'lourencejohn@digicononline.com';
    	$user2->roleid = 3;
    	$user2->first_name = 'interviewer';
    	$user2->last_name = '2';
    	$user2->password = Hash::make('Lcabalun0300');
    	$user2->save();

    	$user3 = new User;
    	$user3->username = 'interviewer3';
    	$user3->email = 'lourencejohn@digicononline.com';
    	$user3->roleid = 3;
    	$user3->first_name = 'interviewer';
    	$user3->last_name = '3';
    	$user3->password = Hash::make('Lcabalun0300');
    	$user3->save();

    	$user4 = new User;
    	$user4->username = 'hiring1';
    	$user4->email = 'lourencejohn@digicononline.com';
    	$user4->roleid = 2;
    	$user4->first_name = 'hiring';
    	$user4->last_name = '1';
    	$user4->password = Hash::make('Lcabalun0300');
    	$user4->save();

        $user6 = new User;
        $user6->username = 'hr_manager1';
        $user6->email = 'lourencejohn@digicononline.com';
        $user6->roleid = 4;
        $user6->first_name = 'hr';
        $user6->last_name = 'manager';
        $user6->password = Hash::make('Lcabalun0300');
        $user6->save();

        $user5 = new User;
        $user5->username = 'guest1';
        $user5->email = 'lourencejohn@digicononline.com';
        $user5->roleid = 1;
        $user5->first_name = 'guest';
        $user5->last_name = '1';
        $user5->password = Hash::make('Lcabalun0300');
        $user5->save();

    	for($i = 1; $i <= 29; $i++){
            // Add Applicant
        	$applicant = new Applicant;
        	$applicant->person_id = $i;
        	$applicant->job_id = 1;
        	$applicant->applied_site = 1;
        	$applicant->application_status_id = 1;
        	$applicant->save();

    	   // Add Person
        	$person = new Person;
        	$person->first_name = "test{$i} first";
        	$person->middle_name = "test{$i} middle";
        	$person->last_name = "test{$i} last";
        	$person->mobile_1 = '09028624357';
        	$person->email = "lou.lamperouge@gmail.com";
        	$person->age = 22;
        	$person->gender = 'Male';
        	$person->city_address = "Barangay Test $i Cebu City 6000";
        	$person->province_address = "Barangay Test $i Cebu City 6000";
        	$person->weight = 55;
        	$person->height = 164;
        	$person->civil_status = 'Single';
        	$person->birthday = '01/15/1990';
        	$person->religion = 'Catholic';
        	$person->father_name = "test{$i} father";
        	$person->mother_name = "test{$i} mother";
        	$person->save();

            // Add School Details
            $school1 = new MiddleSchool;
            $school1->person_id = $i;
            $school1->school_name = "Test{$i} Elementary School";
            $school1->graduated_date = 2002;
            $school1->education_type = 1;
            $school1->save();

            $school2 = new MiddleSchool;
            $school2->person_id = $i;
            $school2->school_name = "Test{$i} High School";
            $school2->graduated_date = 2006;
            $school2->education_type = 2;
            $school2->save();
        }

    }
}
