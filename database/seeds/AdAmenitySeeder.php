<?php

use Illuminate\Database\Seeder;

class AdAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'pl' => [
                    'name' => 'Możliwość płacenia kartą',
                ],
                'en' => [
                    'name' => 'Payment by card'
                ],
            ],
            [
                'pl' => [
                    'name' => 'Akceptujemy zwierzęta domowe'
                ],
                'en' => [
                    'name' => 'We accept pets'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Bar'
                ],
                'en' => [
                    'name' => 'Bar'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Basen kryty'
                ],
                'en' => [
                    'name' => 'Indoor swimming pool'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Basen otwarty'
                ],
                'en' => [
                    'name' => 'Outdoor swimming pool'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Czajnik'
                ],
                'en' => [
                    'name' => 'Kettle'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Dla palących'
                ],
                'en' => [
                    'name' => 'For smokers'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Dla niepalących'
                ],
                'en' => [
                    'name' => 'No smoking'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Dyskoteka/klub'
                ],
                'en' => [
                    'name' => 'Disco / club'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Fitness'
                ],
                'en' => [
                    'name' => 'Fitness'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Garaż'
                ],
                'en' => [
                    'name' => 'Garage'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Grill'
                ],
                'en' => [
                    'name' => 'Grill'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Internet WIFI'
                ],
                'en' => [
                    'name' => 'Internet WIFI'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Internet + komputer'
                ],
                'en' => [
                    'name' => 'Internet + computer'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Klimatyzacja'
                ],
                'en' => [
                    'name' => 'Air conditioning'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Kominek'
                ],
                'en' => [
                    'name' => 'Fireplace'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Kuchnia'
                ],
                'en' => [
                    'name' => 'Kitchen'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Lodówka'
                ],
                'en' => [
                    'name' => 'Fridge'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Łazienka'
                ],
                'en' => [
                    'name' => 'Bathroom'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Parking'
                ],
                'en' => [
                    'name' => 'Parking'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Pralka'
                ],
                'en' => [
                    'name' => 'Washing machine'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Ogród'
                ],
                'en' => [
                    'name' => 'Garden'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Ognisko'
                ],
                'en' => [
                    'name' => 'Fire'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Plac zabaw'
                ],
                'en' => [
                    'name' => 'Playground'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Rowery'
                ],
                'en' => [
                    'name' => 'Bikes'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Sejf'
                ],
                'en' => [
                    'name' => 'Safe'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Suszarka do włosów'
                ],
                'en' => [
                    'name' => 'Hair dryer'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Telewizor'
                ],
                'en' => [
                    'name' => 'TV'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Tenis'
                ],
                'en' => [
                    'name' => 'Tennis'
                ]
            ],
            [
                'pl' => [
                    'name' => 'Wyżywienie'
                ],
                'en' => [
                    'name' => 'Boarding'
                ]
            ]
        ];

        foreach ($data as $key => $datum) {
            $adAmenity = \App\AdAmenity::create([]);
            foreach ($datum as $lang => $item) {
                \App\AdAmenityTranslate::create([
                    'amenity_id' => $adAmenity->id,
                    'lang' => $lang,
                    'name' => $item['name']
                ]);
            }
        }

    }
}
