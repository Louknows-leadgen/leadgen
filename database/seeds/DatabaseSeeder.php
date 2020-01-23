<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	JobsTableSeeder::class,
            ApplicationStatusesTableSeeder::class,
            SitesTableSeeder::class,
            TestsTableSeeder::class,
            RolesTableSeeder::class,
            TestDataSeeder::class
        ]);
    }
}
