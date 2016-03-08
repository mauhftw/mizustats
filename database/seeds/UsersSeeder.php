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

        $role = Role::select('id')->where('name', '=', 'admin')->first();
        $user = User::create([
          'name' => 'Administrador',
          'lastname' => 'Administrador',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'dni' => '34785999',
          'state_id' => '12',
          'city_id' => '228',
          'role_id' => $role->id,
          'active' => '1'
          ]);

          $role = Role::select('id')->where('name', '=', 'user')->first();
          $user = User::create([
            'name' => 'User',
            'lastname' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'dni' => '34785998',
            'state_id' => '12',
            'city_id' => '228',
            'role_id' => $role->id,
            'active' => '1'
            ]);

    }
}
