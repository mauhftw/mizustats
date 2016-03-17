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
      $aux = [];
      $data = [];
      $city = ['Maipu','Godoy Cruz','Ciudad','Las Heras', 'San Rafael', 'Guaymallen', 'San Martin'];
      foreach(range(1,10800) as $index) {
            $aux['user_id'] = $faker->numberBetween($min = 1, $max = 2);
            $aux['value'] = $faker->numberBetween($min = 0, $max =350);
            $aux['city'] = $city[array_rand($city,1)];
            $aux['state'] = 'Mendoza';
            $aux['date'] = $faker->dateTimeBetween($startDate = '-45 days', $endDate = '+15 days');
            $aux['time'] = $faker->time($format = 'H:i:s');
            $data[] = $aux;
      }

      DB::table('water_registers')->insert($data);

    }
}
