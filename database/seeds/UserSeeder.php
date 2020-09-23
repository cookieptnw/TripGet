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
        User::insert([[
            'first_name' => 'admin', 'last_name' => 'admin', 'email' => 'admin@cms.com', 'password' => bcrypt('123456')

        ]]);
    }
}