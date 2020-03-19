<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $companies = [
        	'DCI',
        	'Leadgen'
        ];

        foreach ($companies as $company) {
        	$comp = new Company;
        	$comp->company_name = $company;
        	$comp->save();
        }
    }
}
