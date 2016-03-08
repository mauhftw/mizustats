<?php

namespace App\Helpers;
use App\Models\UserMqtt;
use App\Models\Acl;
use App\Models\City;

class MqttUserHelper {

public static function addAcl($data) {
  //Agregar manejo de errores
  $mqtt = new UserMqtt;
  $mqtt->dni = $data['dni'];
  $mqtt->password = $data['token'];  //falta el hasheado con comando PBKDF2
  $mqtt->super = 0;
  $mqtt->save();

}

public static function addUser($data) {

  $city = City::where('id','=',$data['city'])->first(['name']);
  $acl = new Acl;
  $acl->dni = $data['dni'];
  $acl->topic = $city->name.'/water/'.$acl->dni;
  $acl->rw = 1;
  $acl->save();

  }

}
