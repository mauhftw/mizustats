<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{

    public function run()
    {
      DB::table('cities')->delete();
      $date = date('Y-m-d H:i:s');
      $states = [
        ['id' => 1, 'name' => 'Buenos Aires', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 2, 'name' => 'Catamarca', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 3, 'name' => 'Chaco', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 4, 'name' => 'Chubut', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 5, 'name' => 'Cordoba', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 6, 'name' => 'Corrientes', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 7, 'name' => 'Entre Rios', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 8, 'name' => 'Formosa', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 9, 'name' => 'Jujuy', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 10, 'name' => 'La Pampa', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 11, 'name' => 'La Rioja', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 12, 'name' => 'Mendoza', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 13, 'name' => 'Misiones', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 14, 'name' => 'Rio Negro', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 15, 'name' => 'Salta', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 16, 'name' => 'San Luis', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 17, 'name' => 'San juan', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 18, 'name' => 'Santa Fe', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 19, 'name' => 'Santiago del Estero', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 20, 'name' => 'Tierra del fuego', 'created_at' => $date, 'updated_at' => $date],
        ['id' => 21, 'name' => 'Tucuman','created_at' => $date, 'updated_at' => $date],
        ['id' => 22, 'name' => 'Neuquen','created_at' => $date, 'updated_at' => $date],

      ];

  		DB::table('states')->insert($states);
    }
}
