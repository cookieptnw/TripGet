<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'first_name' => 'admin', 'last_name' => 'admin', 'email' => 'admin@cms.com', 'password' => bcrypt('123456'), "role_id" => 2
            ],
            [
                'first_name' => 'admin2', 'last_name' => 'admin', 'email' => 'admind2@cms.com', 'password' => bcrypt('123456'), "role_id" => 2
            ],
            [
                'first_name' => 'phatthanawan',
                'last_name' => 'chaiwan',
                'email' => 'phatthanawanc@gmail.com',
                'password' => bcrypt('123456'),
                "role_id" => 1
            ]

        ]);
    }
}