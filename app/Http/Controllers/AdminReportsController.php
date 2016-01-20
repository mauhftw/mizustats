<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminReportsController extends Controller {

  public static function index() {
      return view('dashboard.index');
  }

}
