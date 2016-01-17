<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{

    public function run()
    {
        $date = date('Y-m-d H:i:s');
        $roles = [
            ['id' => 1, 'name' => 'Admin', 'created_at' => $date, 'updated_at' => $date],
            ['id' => 2, 'name' => 'User', 'created_at' => $date, 'updated_at' => $date]
        ];

      DB::table('roles')->insert($roles);
    }
}
