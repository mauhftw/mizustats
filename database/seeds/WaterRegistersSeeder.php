<?php

use Illuminate\Database\Seeder;
use App\Models\WaterRegister;
use Faker\Factory as Faker;


class WaterRegistersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

      $faker = Faker::create();
      $city = ['Maipu','Godoycruz','Ciudad','Las heras', 'San rafael', 'Guaymallen', 'San martin'];
      foreach(range(1,10800) as $index) {
          WaterRegister::create([
              'user_id' => $faker->numberBetween($min = 1, $max = 200),
              'value' => $faker->numberBetween($min = 70, $max =350),
              'city' => $city[array_rand($city,1)],
              'state' => 'Mendoza',
              'date' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
              'time' => $faker->time($format = 'H:i:s'),
            ]);
      }

    }
}
