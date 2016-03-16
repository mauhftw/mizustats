<?php

use Illuminate\Database\Seeder;
use App\Models\WaterPrice;
use Faker\Factory as Faker;

class WaterPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $date = date("Y-m-d H:m:s");
      $waterprice = WaterPrice::create([
          'description' => 'febrero',
          'price' => $faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 1),
          'created_at' => $date,
          'updated_at' => $date,
          'active' => 1,
        ]);
    }
}
