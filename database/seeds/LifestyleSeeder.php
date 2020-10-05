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
                "name" => 'ส่วนบุคคล (1-2คน)',
                "group" => '',
                'type' => 'number_of_tourists'
            ],
            [
                "name" => 'เป็นกลุ่ม (3-4คนขึ้นไป)',
                "group" => '',
                'type' => 'number_of_tourists'
            ],




            [
                "name" => 'นักท่องเที่ยวแบบประหยัด',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],

            [
                "name" => 'ชอบผจญภัย',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],

            [
                "name" => 'เดินทางระหว่างวันหยุด',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],

            [
                "name" => 'ชอบชมธรรมชาติ',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'หลงใหลในทะเล',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'เดินทางพร้อมครอบครัว',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],
            [
                "name" => 'รักสัตว์',
                "group" => '',
                'type' => 'lifestyle_travel'
            ],

            [
                "name" => 'วันหยุด',
                "group" => '',
                'type' => 'what_do_you_travel'
            ],
            [
                "name" => 'วันหยุดยาว',
                "group" => '',
                'type' => 'what_do_you_travel'
            ],


            [
                "name" => 'สแตนดาร์ด',
                "group" => '',
                'type' => 'room_type'
            ],
            [
                "name" => 'ดีลักซ์',
                "group" => '',
                'type' => 'room_type'
            ],
            [
                "name" => 'ซีวิว',
                "group" => '',
                'type' => 'room_type'
            ],
            [
                "name" => 'แฟมิลี่รูม',
                "group" => '',
                'type' => 'room_type'
            ],
            [
                "name" => 'พูล เอกเซส',
                "group" => '',
                'type' => 'room_type'
            ],
            [
                "name" => 'เหมาจ่าย',
                "group" => '',
                'type' => 'how_to_get_there'
            ],
            [

                "name" => 'เบ็ดเสร็จ',
                "group" => '',
                'type' => 'how_to_get_there'
            ],

        ]);
    }
}