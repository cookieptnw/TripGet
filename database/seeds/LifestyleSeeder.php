<?php

use Illuminate\Database\Seeder;
use App\Lifestyle;
use PA\ProvinceTh\Factory;

class LifestyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provinces = Factory::province();
        $provinceArray = $provinces->toArray();

        foreach ($provinceArray as $p) {

            Lifestyle::insert([[
                "name" => $p['name_th'],
                "group" => $provinces->find($p['id'])->geography()['name'],
                'type' => 'province'
            ]]);
        }

        Lifestyle::insert([
            [
                "name" => 'Group Tour',
                "group" => '',
                'type' => 'number_of_tourists'
            ],
            [
                "name" => 'Indepedent Tour',
                "group" => '',
                'type' => 'number_of_tourists'
            ],
            [
                "name" => 'Adventure',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Family',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Vacationers',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Nature',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Budget',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Sea lover',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Animal Lover',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'Holiday',
                "group" => '',
                'type' => 'what_do_you_travel'
            ],
            [
                "name" => 'Weekend',
                "group" => '',
                'type' => 'what_do_you_travel'
            ],
            [
                "name" => 'Package Tour',
                "group" => '',
                'type' => 'how_to_get_there'
            ],
            [
                "name" => 'Inclusive Tour',
                "group" => '',
                'type' => 'how_to_get_there'
            ]
        ]);
    }
}