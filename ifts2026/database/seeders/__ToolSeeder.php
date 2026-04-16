<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Process\FakeProcessDescription;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\FileIterator\Factory;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $tools = [
        //     ['name' => 'Hammer', 'price' => 19.99, 'color' => 'Red'],
        //     ['name' => 'Screwdriver', 'price' => 9.99, 'color' => 'Blue'],
        //     ['name' => 'Wrench', 'price' => 14.99, 'color' => 'Green'],
        // ];

        // foreach ($tools as $tool) {
        //     DB::table('tools')->insert($tool);
        // }
        $faker = \Faker\Factory::create();

        $tools = [
            'Martello',
            'Cacciavite',
            'Chiave inglese',
            'Trapano',
            'Sega',
            'Pinza',
            'Scalpello',
            'Livella',
            'Metro',
            'Taglierino'
        ];
        for ($i = 0; $i < 5; $i++)    {

            DB::table('tools')->insert([
                'name' => $faker->randomElement($tools),
                'price' => $faker->randomFloat(2, 5, 100), // decimale (2 cifre)
                'color' => $faker->randomElement(['Rosso', 'Blu', 'Verde', 'Giallo', 'Nero', 'Bianco', 'Arancione', 'Viola', 'Grigio', 'Marrone']),
            ]);
        }
    }
}
