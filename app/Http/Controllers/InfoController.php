<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;

class InfoController extends Controller {

  public function __construct()
  {
    $role = Role::where('name','user')->first();
    $this->middleware('auth');
    $this->authorize('auth',$role);
  }

  public static function index () {

  }


}
