<?php

use Illuminate\Database\Seeder;
use App\Models\WaterPrice;

class WaterPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $date = date("Y-m-d H:m:s");
      $waterprice = WaterPrice::create([
          'description' => 'febrero',
          'price' => '22',
          'created_at' => $date,
          'updated_at' => $date,
          'active' => 1,
        ]);
    }
}
