<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TaskStatusesSeeder::class);
        //$this->call(TaskTypesSeeder::class);

        $this->call(RoomsSeeder::class);
    }
}
