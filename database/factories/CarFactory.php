<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => $this->faker->randomElement(["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg","8.jpg",
            "9.jpg", "10.jpg", "11.jpg", "12.jpg","13.jpg","14.jpg","15.jpg","16.jpg","17.jpg","18.jpg","19.jpg", "20.jpg", "21.jpg", "22.jpg", "23.jpg", "24.jpg",]),
            'Make' => $this->faker->randomElement(["Abarth",
            "Alfa Romeo",
            "Aston Martin",
            "Audi",
            "Bentley",
            "BMW",
            "Bugatti",
            "Cadillac",
            "Chevrolet",
            "Chrysler",
            "Citroën",
            "Dacia",
            "Daewoo",
            "Daihatsu",
            "Dodge",
            "Donkervoort",
            "DS",
            "Ferrari",
            "Fiat",
            "Fisker",
            "Ford",
            "Honda",
            "Hummer",
            "Hyundai",
            "Infiniti",
            "Iveco",
            "Jaguar",
            "Jeep",
            "Kia",
            "KTM",
            "Lada",
            "Lamborghini",
            "Lancia",
            "Land Rover",
            "Landwind",
            "Lexus",
            "Lotus",
            "Maserati",
            "Maybach",
            "Mazda",
            "McLaren",
            "Mercedes-Benz",
            "MG",
            "Mini",
            "Mitsubishi",
            "Morgan",
            "Nissan",
            "Opel",
            "Peugeot",
            "Porsche",
            "Renault",
            "Rolls-Royce",
            "Rover",
            "Saab",
            "Seat",
            "Skoda",
            "Smart",
            "SsangYong",
            "Subaru",
            "Suzuki",
            "Tesla",
            "Toyota",
            "Volkswagen",
            "Volvo"]),
            'Model' => $this->faker->randomElement(["Gran Fury", "Nubira", "Sonic", "Acadia", "Corniche", "Gran Turismo", "Oasis", "Sonoma", "Accent", "Corolla", "Grand Am", "Odyssey	Sorento", "Acclaim	Coronet", "Grand Prix", "Omega", "Soul", "Accord", "Corrado", "Grand Vitara", "Omni", "Spark", "Achieva", "Corsair", "Grand", "Voyager", "Optima", "Spectra", "Aerio", "Corsica	Greiz", "Outback", "Spectrum", "Aerostar", "Cortina", "Gremlin", "Outlander", "Spider", "Aileron", "Corvette", "Grenada"]),
            'Colour' => $this->faker->randomElement(["Red", "Blue", "Green", "Yellow", "Black", "White"]),
            'Registration' => $this->faker->word(),
            'Asking_Price' => $this->faker->randomNumber(5, true),
            'Location' => $this->faker->randomElement(["Carlow", "Cavan", "Clare", "Cork", "Donegal", "Dublin", "Galway", "Kerry", "Kildare", "Kilkenny", "Laois", "Leitrim", "Limerick", "Longford", "Louth", "Mayo", "Meath", "Monaghan", "Offaly", "Roscommon", "Sligo", "Tipperary", "Waterford", "Westmeath", "Wexford", "Wicklow"]),
            'Description' => $this->faker->text(),
            'dateOfNCTExpiration' => $this->faker->date(),
            'dateOfTaxExpiration' => $this->faker->date(),
            'email' => Str::random(10).'@gmail.com',
        ];
    }
}
