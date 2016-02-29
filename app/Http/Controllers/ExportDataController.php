<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExportDataController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
      $role = Role::where('name','admin')->first();
      $this->authorize('auth',$role);
  }

  public static function index() {
      return view ('export.index');

  }
  public static function download() {

  }
}
