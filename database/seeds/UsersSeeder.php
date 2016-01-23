<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $rol = Role::select('id')->where('name', '=', 'admin')->first();
        $user = User::create([
          'name' => 'Administrador',
          'lastname' => 'Administrador',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'dni' => '34785999',
          'state_id' => '12',
          'city_id' => '228',
          'rol_id' => $rol->id,
          'active' => '1'
          ]);

    }
}
