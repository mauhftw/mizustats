<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMqtt extends Model
{
  protected $connection = 'mqtt';
  protected $table = 'users';
  protected $timestamp = 'false';

}
