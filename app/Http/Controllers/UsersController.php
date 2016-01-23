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

          $role = Role::select('name','id')->where('id','=',$request->input('role_id'))->first();
          $user = new User;

          if ($role->name == 'Admin') {              //Admin
              $user->password = Hash::make($request->input('password'));
              $user->active = 1;
              $user->role_id = $role->id;
          } else {                                   //Client
              $client = Role::select('id')->where('name','=','User')->first();
              $token = str_random(32);      //make hash
              $password = str_random(16);
              $user->role_id = $client->id;
              $user->password = Hash::make($password);
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

      $user = User::find($id);
      if(!$user) {
        return redirect()->back()->withErrors('No se encontro el usuario solicitado');
      }

      $states = State::lists('name','id');
      $cities = City::lists('name','id');
      $roles = Role::lists('name','id');
      $data = [
        "user" => $user,
        "states" => $states,
        "cities" => $cities,
        "roles" => $roles,
        ];

      return view('users.edit')->with($data);

    }

    public static function update (UserRequest $request, $id) {

      $user = User::find($id);
      if(!$user) {
        return redirect()->back()->withErrors('No se encontro el usuario solicitado');
      }

      $role = Role::select('name','id')->where('id','=',$request->input('role_id'))->first();
      if ($role->name == 'Admin') {  //Admin
          $user->role_id = $role->id;
      } else {                       //Client
          $client = Role::select('id')->where('name','=','User')->first();
          //$token = str_random(32);
          $user->role_id = $client->id;
          //$user->active = 0;
          /*hay que guardar los datos de login en la bases de datos mqtt*/
          /*Implementar colas para el tema de mails*/
      }

      if (!$request->has('active')){      //check checkbox :D
          $user->active = 0;
      } else {
          $user->active = $request->input('active');
      }

      $user->password = Hash::make($request->input('password'));
      $user->name = $request->input('name');
      $user->lastname =$request->input('lastname');
      $user->email = $request->input('email');
      $user->dni = $request->input('dni');
      $user->state_id = $request->input('state_id');
      $user->city_id = $request->input('city_id');
      $user->save();

      return redirect()->route('users.index')->with('success', trans('El usuario se ha modificado correctamente'));


    }
    public static function delete($id) {

      $user = User::find($id);
      if (!$user) {
          return redirect()->back()->withErrors([trans('El usuario seleccionado no existe')]);
      }
      $tax->delete();
      if ($request->ajax()) {
          return response()->json(['code' => 200]);
      }
      else {
          return redirect()->route('users.index')->with('success',trans('El usuario se ha eliminado correctamente'));
      }

    }
}
