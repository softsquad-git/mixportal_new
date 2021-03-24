<?php

use Illuminate\Database\Seeder;

class SettingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type' => 'service_name'],
            ['type' => 'facebook_url'],
            ['type' => 'payu_pos_id'],
            ['type' => 'payu_signature_key'],
            ['type' => 'payu_client_id'],
            ['type' => 'payu_client_secret'],
            ['type' => 'paypal_client_id'],
            ['type' => 'paypal_client_secret']
        ];

        \App\SettingPage::insert($data);
    }
}
