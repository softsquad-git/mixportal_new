<?php

use Illuminate\Database\Seeder;

class AdvertFacilities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_facilities')->insert([
            [
                'text' => 'Możliwość płacenia kartą'
            ],
            [
                'text' => 'Akceptujemy zwierzęta domowe'
            ],
            [
                'text' => 'Bar'
            ],
            [
                'text' => 'Basen kryty'
            ],
            [
                'text' => 'Basen otwarty'
            ],
            [
                'text' => 'Czajnik'
            ],
            [
                'text' => 'Dla palących'
            ],
            [
                'text' => 'Dla niepalących'
            ],
            [
                'text' => 'Dyskoteka / klub'
            ],
            [
                'text' => 'Fitness'
            ],
            [
                'text' => 'Garaż'
            ],
            [
                'text' => 'Grill'
            ],
            [
                'text' => 'Internet WIFI'
            ],
            [
                'text' => 'Internet + komputer'
            ],
            [
                'text' => 'Klimatyzacja'
            ],
            [
                'text' => 'Kominek'
            ],
            [
                'text' => 'Kuchnia'
            ],
            [
                'text' => 'Lodówka'
            ],
            [
                'text' => 'Łazienka'
            ],
            [
                'text' => 'Parking'
            ],
            [
                'text' => 'Pralka'
            ],
            [
                'text' => 'Ogród'
            ],
            [
                'text' => 'Ognisko'
            ],
            [
                'text' => 'Plac zabaw'
            ],
            [
                'text' => 'Rowery'
            ],
            [
                'text' => 'Sejf'
            ],
            [
                'text' => 'Szuszarka do włosów'
            ],
            [
                'text' => 'Telewizor'
            ],
            [
                'text' => 'Tenis'
            ],
            [
                'text' => 'Wyżywienie'
            ]]);
    }
}
