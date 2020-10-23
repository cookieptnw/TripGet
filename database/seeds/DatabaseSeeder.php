<?php

use App\MainHotel;
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
        $this->call([RoleSeeder::class, LifestyleSeeder::class, VoucherCategorySeeder::class, UserSeeder::class, MainHotelSeeder::class, HotelSeeder::class]);
    }
}