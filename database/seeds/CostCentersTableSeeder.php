<?php

use Illuminate\Database\Seeder;
use App\Models\CostCenter;

class CostCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cost_centers = [
        	'AGNT',
			'FCL',
			'HR Admin',
			'IT',
			'OPS SPV',
			'QA Trnr',
			'QA',
			'HR',
			'QA ',
			'Legal/Accounting',
			'EXEC',
			'QA Mngr',
			'QA SPV'
        ];

        foreach ($cost_centers as $cost_center) {
        	$cc = new CostCenter;
        	$cc->cost_name = $cost_center;
        	$cc->save();
        }
    }
}
