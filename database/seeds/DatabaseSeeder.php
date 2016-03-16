<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
  use Jenssegers\Mongodb\Model as Moloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();

      $this->call(StatesSeeder::class);
      $this->call(CitiesSeeder::class);
      $this->call(RolesSeeder::class);
      $this->call(UsersSeeder::class);
      $this->call(WaterPricesSeeder::class);
      $this->call(WaterRegistersSeeder::class);
      $this->call(MqttUsersSeeder::class);
      $this->call(AclsSeeder::class);

      Model::reguard();
    }
}
