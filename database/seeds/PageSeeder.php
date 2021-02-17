<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Kontakt',
                'alias' => 'kontakt',
                'lang' => 'pl'
            ],
            [
                'title' => 'Regulamin',
                'alias' => 'regulamin',
                'lang' => 'pl'
            ],
            [
                'title' => 'Polityka prywatności',
                'alias' => 'polityka-prywatnosci',
                'lang' => 'pl'
            ],
            [
                'title' => 'Jak utworzyć reklamę',
                'alias' => 'jak-utworzyc-reklame',
                'lang' => 'pl'
            ],
            [
                'title' => 'Reklama - Patronat',
                'alias' => 'reklama-patronat',
                'lang' => 'pl'
            ],
            [
                'title' => 'Obowiązek informacyjny',
                'alias' => 'obowiazek-informacyjny',
                'lang' => 'pl'
            ],
            [
                'title' => 'Cennik',
                'alias' => 'cennik',
                'lang' => 'pl'
            ],
            [
                'title' => 'Redakcja',
                'alias' => 'redakcje',
                'lang' => 'pl'
            ]
        ];

        \App\Page::insert($data);
    }
}
