<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Hash;
use Datatables;

class UsersController extends Controller {

    public static function index() {
      return view('users.index');
    }

    public static function getDatatable() {

      $users = User::select(['id','name','lastname','state_id','city_id'])->get();
      $datatable = Datatables::of($users);
      $datatable->addColumn('actions', '<a href="{{ URL::to(\'users/\' . $id.\'/edit\') }}" class="btn btn-default" title="Editar" ><i class="fa fa-edit"></i></a>
                                        <a href="#deleteModal" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-danger delete-link" data-href="{{ URL::to(\'users/\' . $id) }}" title="Eliminar" ><i class="fa fa-trash"></i></a>');

      return $datatable->make(true);

    }

    public static function create() {

      $states = State::lists('name','id');
      $cities = City::lists('name','id');
      $roles = Role::lists('name','id');

      if (!$states || !$cities) {
         return redirect()->back()->withErrors('No hay Provincias/Ciudades cargadas en el sistema');
      }

      if (!$roles) {
        return redirect()->back()->withErrors('No hay roles registrados en el sistema');
      }

      $data = [
        "states" => $states,
        "cities" => $cities,
        "roles" => $roles
      ];

      return view('users.create')->with($data);

    }


    public static function store(UserRequest $request) {

          $rol = Role::select('name','id')->where('id','=',$request->input('rol_id'))->first();
          $user = new User;

          if ($rol->name == 'Admin') {              //Admin
              $user->password = Hash::make($request->input('password'));
              $user->active = 1;
              $user->rol_id = $rol->id;
          } else {                                        //Client
              $client = Role::select('id')->where('name','=','User')->first();
              $token = str_random(32);      //make hash
              $user->rol_id = $client->id;
              $user->token = $token;
              $user->active = 0;
              /*hay que guardar los datos de login en la bases de datos mqtt*/
              /*Implementar colas para el tema de mails*/
          }

          $user->name = $request->input('name');
          $user->lastname =$request->input('lastname');
          $user->email = $request->input('email');
          $user->dni = $request->input('dni');
          $user->state_id = $request->input('state_id');
          $user->city_id = $request->input('city_id');
          $user->save();

          return redirect()->route('users.index')->with('success', trans('El usuario se ha creado correctamente'));
    }
    public static function show($id) {

    }
    public static function edit($id) {

      $user = User::find($id)->first();
      $data = [
        "user" => $user
        ];

      if(!$data) {
        return redirect()->back()->withErrors('No se encontro el usuario solicitado');
      }

      return view('users.edit')->with($data);
    }

    public static function update ($id) {

    }
    public static function delete($id) {

    }
}
