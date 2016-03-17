<?php

namespace App\Helpers;
use App\Models\UserMqtt;
use App\Models\Acl;
use App\Models\City;

class MqttUserHelper {

public static function addAcl($data) {
  //Agregar manejo de errores
  $password = shell_exec("/usr/bin/np -p". $data['token']); //hasheado PBKDF2
  $mqtt = new UserMqtt;
  $mqtt->dni = $data['dni'];
  $mqtt->password = $password;
  $mqtt->super = 0;
  $mqtt->save();

}

public static function addUser($data) {

  $city = City::with('state')->where('id','=',$data['city'])->first();
  //echo $city->name;
  ;
  $acl = new Acl;
  $acl->dni = $data['dni'];
  $acl->topic = $city->state->name.'/'.$city->name.'/Water/'.$acl->dni;    //Definir Mendoza/water/dni
  $acl->rw = 1;
  $acl->save();

  }

}
