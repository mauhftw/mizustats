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

  public static function showLargestStateConsumer() {   //mayor y menor en este
        $today = date("Y-m-d");
        $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                            ->where('date', '=', $today)
                            ->where('state','=','Mendoza')
                            ->orderBy('total','desc') //ordeno de mayor a menor
                            ->groupBy('city')
                            ->get();
        //manejar errores
       $largest = reset($consumers);  //1er elemento, mayor
       $smallest = end($consumers);  //ultimo elemento, menor
       print_r($largest);
       print_r ($smallest);

  }

  public static function showTotalMonthConsumption() {
        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");

        $total = WaterRegister::where('state','=','Mendoza')
                              ->whereBetween('date',[$first_day,$last_day])
                              ->sum('value');
        echo $total;

  }

  public static function showCitiesMonthsConsumptionGraph() { //todas las ciudades en el mes
        $today = date("Y-m-d");
        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");

        $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                        ->whereBetween('date',[$first_day,$last_day])
                        ->where('date', '=', $today)
                        ->where('state','=','Mendoza')
                        ->orderBy('total','desc') //ordeno de mayor a menor
                        ->groupBy('city')
                        ->get();
        dd($consumers);
  }

  public static function showCitiesDaysConsumptionGraph() {   //todos las ciudades en el dia
    $today = date("Y-m-d");
    $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                        ->where('date', '=', $today)
                        ->where('state','=','Mendoza')
                        ->orderBy('total','desc') //ordeno de mayor a menor
                        ->groupBy('city')
                        ->get();
    dd($consumers);


  }


}
