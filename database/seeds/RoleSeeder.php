<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                "name" => 'member'
            ],
            [
                "name" => 'admin'
            ], [
                "name" => 'admin_hotel'
            ]


        ]);
    }
}