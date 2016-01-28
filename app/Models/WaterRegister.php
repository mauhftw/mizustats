<?php

namespace App\Register;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model as Moloquent;

class WaterRegister extends Moloquent {

    protected $connection = 'mongodb';
    protected $collection = 'water_registers';


}
