<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WaterRegister;
use App\Models\User;
use DB;

class AdminReportsController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
  }

  public static function index() {
      return view('dashboard.index');
  }

  public static function showRegisteredUsers() {
      $users = User::select('id')->active()->get();
      echo $users;
  }

  public static function showWaterConsumption() {
      $today = date("Y-m-d");   //variable protegida?
      $consumption = WaterRegister::where('date', '=', $today)
                        ->where('state', '=', 'Mendoza')  //ver si conviene poner id o el state
                        ->sum('value');
      echo $consumption;
  }

  public static function showWaterConsumptionPerHour(){
      $today = date("Y-m-d");
      $consumption = WaterRegister::where('date', '=', $today)
                        ->where('state', '=', 'Mendoza')
                        ->sum('value');
      $perHour = $consumption/60;
      echo $perHour;

  }

  public static function showLargestStateConsumer() {
        $today = date("Y-m-d");
      /*  $consumers = WaterRegister::where('date', '=', $today)
                          ->where('state', '=', 'Mendoza')
                          //->groupBy('city')

                          ->get();*/
          /*$consumers = DB::table('water_registers')->where('date', '=', $today)
                            ->where('state','=','Mendoza')
                            ->groupBy('city')
                            ->sum('value')
                            ->get();*/
         echo $consumers;

  }

}
