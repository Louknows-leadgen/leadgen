<?php

use Illuminate\Database\Seeder;
use App\Models\ExitType;

class ExitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $exit_types = [
        	'Resignation',
        	'Termination'
        ];

        foreach ($exit_types as $exit_type) {
        	$exit = new ExitType;
        	$exit->name = $exit_type;
        	$exit->save();
        }
    }
}
