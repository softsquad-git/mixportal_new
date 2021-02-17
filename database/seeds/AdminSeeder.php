<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'biuro@softsquad.pl',
            'password' => \Illuminate\Support\Facades\Hash::make('start123'),
            'admin' => 1,
            'firstname' => 'Soft',
            'surname' => 'Squad'
        ]);
    }
}
