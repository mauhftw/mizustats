<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Session;
use App\Http\Requests\ClientRequest;
use Hash;

class ProfileController extends Controller {

  public function __construct()
  {
    $role = Role::where('name','user')->first();
    $this->middleware('auth');
    $this->middleware('session');
    $this->authorize('auth',$role);
  }

  public static function edit() {

    $id = Session::get('user_id');
    $user = User::find($id);
    if(!$user) {
      return redirect()->back()->withErrors('No se encontro el usuario solicitado');
    }

    $data = [
      "user" => $user
      ];

    return view('clients.edit')->with($data);

  }

  public static function update (ClientRequest $request, $id) {

    $user = User::find($id);
    if(!$user) {
      return redirect()->back()->withErrors('No se encontro el usuario solicitado');
    }

    $user->password = Hash::make($request->input('password'));
    $user->name = $request->input('name');
    $user->lastname =$request->input('lastname');
    $user->email = $request->input('email');
    $user->save();

    return redirect()->route('home.index')->with('success', trans('El usuario se ha modificado correctamente'));

  }


}
