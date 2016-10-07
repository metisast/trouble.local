<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'user',
                'email' => 'metis_ast@mail.ru',
                'password' => bcrypt('Shag1115'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_id' => 2,
                'name' => 'admin',
                'email' => 'metis1_ast@mail.ru',
                'password' => bcrypt('Shag1116'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
