<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\car>
 */
class CarFactory extends Factory

/*The car factory is for creating the data that will be generated and then sent to the database via the seeder. */
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*I used various arrays to select a random element from the array in order to generate random
        names (makes and models) and images for each advertisement */
        return [
            'image' => $this->faker->randomElement([
                "1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg",
                "9.jpg", "10.jpg", "11.jpg", "12.jpg", "13.jpg", "14.jpg", "15.jpg", "16.jpg", "17.jpg", "18.jpg", "19.jpg", "20.jpg", "21.jpg", "22.jpg", "23.jpg", "24.jpg",
            ]),

            'Model' => $this->faker->randomElement(["Gran Fury", "Nubira", "Sonic", "Acadia", "Corniche", "Gran Turismo", "Oasis", "Sonoma", "Accent", "Corolla", "Grand Am", "Odyssey	Sorento", "Acclaim	Coronet", "Grand Prix", "Omega", "Soul", "Accord", "Corrado", "Grand Vitara", "Omni", "Spark", "Achieva", "Corsair", "Grand", "Voyager", "Optima", "Spectra", "Aerio", "Corsica	Greiz", "Outback", "Spectrum", "Aerostar", "Cortina", "Gremlin", "Outlander", "Spider", "Aileron", "Corvette", "Grenada"]),
            'Colour' => $this->faker->randomElement(["Red", "Blue", "Green", "Yellow", "Black", "White"]),
            /*This generates a random asking price and registration using faker
            Faker is a php library used to generate fake data */
            'Registration' => $this->faker->randomNumber(8, true),
            'Asking_Price' => $this->faker->randomNumber(5, true),
            'Location' => $this->faker->randomElement(["Carlow", "Cavan", "Clare", "Cork", "Donegal", "Dublin", "Galway", "Kerry", "Kildare", "Kilkenny", "Laois", "Leitrim", "Limerick", "Longford", "Louth", "Mayo", "Meath", "Monaghan", "Offaly", "Roscommon", "Sligo", "Tipperary", "Waterford", "Westmeath", "Wexford", "Wicklow"]),
            'Description' => $this->faker->text(),
            'dateOfNCTExpiration' => $this->faker->date(),
            'dateOfTaxExpiration' => $this->faker->date(),
            /*Generates a random string and adds it to the gmail ending text specified */
            'email' => Str::random(10) . '@gmail.com',
        ];
    }
}
