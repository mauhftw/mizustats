<?php

use Illuminate\Database\Seeder;
use App\Models\Acl;

class AclsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = Acl::create([
        'dni' => '34785998',
        'topic' => 'Mendoza/Godoy Cruz/water/34785998',
        'rw' => '1',
        ]);
        //mqtt acl
        $user = Acl::create([
          'dni' => '34785666',
          'topic' => 'Mendoza/+/water/+',
          'rw' => '2',
          ]);
    }
}
