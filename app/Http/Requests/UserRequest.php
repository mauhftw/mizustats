<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;

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
        - Agregar un if segun la ruta?
      */
        $http_method = $this->method();
        if ($http_method == 'POST'){
          return [
            'name' => 'required|between:2,32|alpha',
            'lastname' => 'required|between:2,32|alpha',
            'email' => 'required|email|max:128|unique:users,email',
            'password' => 'required|min:6',
            'dni' => 'required|numeric|unique:users,dni',
            'state_id' => 'required|exists:states,id',
            'city_id' =>'required|exists:cities,id',
            'role_id' =>'required|numeric|exists:roles,id',
          ];

        } else if ($http_method == 'PUT') {

          $id = Session::get('user_id');
          $user = User::where('id','=',$id)->first();
            return [
              'name' => 'required|between:2,32|alpha',
              'lastname' => 'required|between:2,32|alpha',
              'email' => 'required|email|max:128|unique:users,email,'.$user->id,
              'password' => 'required|min:6',
              'dni' => 'required|numeric|unique:users,dni,'.$user->id,
              'state_id' => 'required|exists:states,id',
              'city_id' =>'required|exists:cities,id',
              'role_id' =>'required|numeric|exists:roles,id',
              'active' => 'boolean'   
            ];
        } else {
          return [];
        }
    }
}
