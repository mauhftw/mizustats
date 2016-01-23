<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WaterPricesController extends Controller {

  public static function index() {
      return view ('water-prices.index');
  }
  public static function getDatatable() {

  }
  public static function create() {
      return view ('water-prices.create');
  }
  public static function store() {

  }
  public static function show($id) {

  }
  public static function edit($id) {

  }
  public static function update ($id) {

  }
  public static function delete($id) {

  }

}
