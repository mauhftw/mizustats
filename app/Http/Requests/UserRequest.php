<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
      /*
        -Si registro un usuario no deberia pedir password (se generara auto), solo para el admin
        -Cuidado con el update (por el email que ya existe)
      */
        return [
          'name' => 'required|between:2,32|alpha',
          'lastname' => 'required|between:2,32|alpha',
          'email' => 'required|email|max:128|unique:users,email',
          'password' => 'required|min:6|confirmed',
          'dni' => 'required|numeric|unique:users,dni',
          'state_id' => 'required|exists:states,id',
          'city_id' =>'required|exists:cities,id',
          'rol_id' =>'required|numeric|exists:roles,id',
        ];
    }
}
