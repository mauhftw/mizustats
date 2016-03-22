<?php

use Illuminate\Database\Seeder;
use App\Models\UserMqtt;

class MqttUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $password = shell_exec("/usr/bin/np -p 123456");
      $user = UserMqtt::create([
        'dni' => '34785998',
        'password' => $password,
        'super' => '0',
        ]);

        //mqtt subscriber
        $password = shell_exec("/usr/bin/np -p 123456");
        $user = UserMqtt::create([
          'dni' => '34785666',
          'password' => $password,
          'super' => '1',
          ]);


    }
}
