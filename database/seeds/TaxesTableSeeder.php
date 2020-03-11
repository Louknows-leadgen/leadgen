<?php

use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tax_codes = [
        	['tax_name'=>'S','tax_desc'=>'Standard'],
        	['tax_name'=>'S1','tax_desc'=>'Standard 1'],
        	['tax_name'=>'M','tax_desc'=>'Minimum'],
        ];

        $size = count($tax_codes);

        for($i = 0; $i < $size; $i++){
        	$tax_name = $tax_codes[$i]['tax_name'];
        	$tax_desc = $tax_codes[$i]['tax_desc'];
        	$arr = ['tax_name'=>$tax_name,'tax_desc'=>$tax_desc];
        	$tax = new Tax($arr);
        	$tax->create($arr);
        }
    }
}


