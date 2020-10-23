<?php

use Illuminate\Database\Seeder;
use App\VoucherCategory;

class VoucherCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoucherCategory::insert([
            ["name" => 'โรงแรม', "image_url" => 'wdw'],
            ["name" => 'ร้านอาหาร', "image_url" => 'wdw'],
            ["name" => 'ท่องเที่ยว', "image_url" => 'wdw'],
            ["name" => 'แนะนำสถานที่', "image_url" => 'wdw']
        ]);
    }
}