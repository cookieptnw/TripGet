<?php

use Illuminate\Database\Seeder;
use App\MainHotel;

class MainHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainHotel::insert([
            [
                'name' => 'bkk hotel',
                'description' => 'lorem'
            ],
            [
                'name' => 'cnx hotel',
                'description' => 'lorem'
            ],
            [
                'name' => 'huahin hotel',
                'description' => 'lorem'
            ]
        ]);
    }
}