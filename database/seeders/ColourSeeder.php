<?php

namespace Database\Seeders;

use App\Models\Colour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\car;



class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colours = [
            [
                'name' => 'Red',

            ],
            [
                'name' => 'Green',

            ],
            [
                'name' => 'Blue',

            ],
            [
                'name' => "Yellow",

            ]
        ];

        foreach ($colours as $colours) {
            Colour::create($colours);
        }
        foreach (car::all() as $car) {
            $colours = Colour::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $car->colours()->attach($colours);
        }
    }
}
