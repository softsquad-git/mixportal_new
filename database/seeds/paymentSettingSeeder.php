<?php

use Illuminate\Database\Seeder;

class paymentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_setting')->insert([
            [
                'type'=> 10,
                'name' => 'baza talentów',
                'description'=>'Opłata za ogłoszenie w bazie talentów',
                'price'=>150
            ],
            [
                'type'=> 100,
                'name' => 'baza noclegów',
                'description'=>'Opłata za ogłoszenie w bazie noclegów ',
                'price'=>150
            ],
            [
                'type'=> 1000,
                'name' => 'baza firm',
                'description'=>'Opłata za ogłoszenie w bazie firm',
                'price'=>150
            ]
        ]);
    }

}
