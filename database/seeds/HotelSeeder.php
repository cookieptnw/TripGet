<?php

use Illuminate\Database\Seeder;
use App\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::insert([
            [
                'name' => 'bkk hotel สาขา 1',
                'description' => 'lorem',
                'google_map_url' => 'http://google.com',
                'tel_no' => '0900000000',
                'lat' => 100,
                'long' => 200,
                'approved_at' => \Carbon\Carbon::now(),
                'district' => '1',
                'sub_district' => '2',
                'province' => 'bangkok',
                'main_hotel_id' => 1
            ],
            [
                'name' => 'bkk hotel สาขา 2',
                'description' => 'lorem',
                'google_map_url' => 'http://google.com',
                'tel_no' => '0900000000',
                'lat' => 100,
                'long' => 200,
                'approved_at' => \Carbon\Carbon::now(),
                'district' => '1',
                'sub_district' => '2',
                'province' => 'bangkok',
                'main_hotel_id' => 1
            ],
            [
                'name' => 'bkk hotel สาขา 3',
                'description' => 'lorem',
                'google_map_url' => 'http://google.com',
                'tel_no' => '0900000000',
                'lat' => 100,
                'long' => 200,
                'approved_at' => \Carbon\Carbon::now(),
                'district' => '1',
                'sub_district' => '2',
                'province' => 'bangkok',
                'main_hotel_id' => 1
            ],
            [
                'name' => 'bkk hotel สาขา 4',
                'description' => 'lorem',
                'google_map_url' => 'http://google.com',
                'tel_no' => '0900000000',
                'lat' => 100,
                'long' => 200,
                'approved_at' => \Carbon\Carbon::now(),
                'district' => '1',
                'sub_district' => '2',
                'province' => 'bangkok',
                'main_hotel_id' => 1
            ],

        ]);
    }
}