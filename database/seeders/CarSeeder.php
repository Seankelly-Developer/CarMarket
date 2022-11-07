<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\car;
class CarSeeder extends Seeder

/*The seeder is used to add the data created in the factory to the database */

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()->times(30)->create();
    }
}
