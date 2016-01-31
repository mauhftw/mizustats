<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WaterRegister;
use App\Models\WaterPrice;
use App\Models\City;
use DB;


class ClientReportsController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
  }

  public static function index() {
      return view('home.index');
  }

  public static function showTotalMonthConsumption() {

        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");

        $total = WaterRegister::where('state','=','Mendoza') //reemplazar por session(user_id)
                              ->where('user_id','=','1')  //reemplazar por session(user_id)
                              ->whereBetween('date',[$first_day,$last_day])
                              ->sum('value');
        echo $total;

  }

  public static function showCityConsumption() { //total y promedio

      $first_day = date("Y-m-01");
      $last_day = date("Y-m-t");

      /*$city = User::with('city')->get();
            probar first();
      */
      $total = WaterRegister::select(DB::raw('count(id) as total, avg(value) as avg'))
                            ->where('city','=','Godoycruz') //reemplazar por city
                            ->whereBetween('date',[$first_day,$last_day])
                            ->groupBy('city')
                            ->get();
      echo $total;
      //divido por 60 el avg y tengo litros por hora
  }

  public static function showCityAverageConsumption() {

      $first_day = date("Y-m-01");
      $last_day = date("Y-m-t");

      /*$city = User::with('city')->get();
            probar first();
      */
      $total = WaterRegister::where('city','=','Godoycruz') //reemplazar por city
                            ->whereBetween('date',[$first_day,$last_day])
                            ->sum('value');
      echo $total;
  }

  public static function showWaterConsumption() {  //total, por hora y precio a pagar
      $today = date("Y-m-d");   //variable protegida?
      $consumption = WaterRegister::where('date', '=', $today)
                        ->where('user_id', '=', '1')  //traer user id de la session
                        ->sum('value');
      echo $consumption;
      //divido el total por hora y obtengo el lts/hora

  }

  public static function showWaterPrice() {
      $price = WaterPrice::select('price')->active()->get();
      echo $price;
  }

  public static function showWaterBill() {

      $price = WaterPrice::select('price')->active()->get();
      //echo $price;
      $price = $price[0]->price;
      //echo $price;

      $today = date("Y-m-d");   //variable protegida?
      $consumption = WaterRegister::where('date', '=', $today)
                        ->where('user_id', '=', '1')  //traer user id de la session
                        ->sum('value');

      echo $consumption*$price;

  }

  public static function showDayConsumptionGraph() { //consumo de los dias de la semana
        $first = date("Y-m-d");
        $last = date("Y-m-d",strtotime('-5 day'));
        echo $last;
        //echo $last;
        $consumption = DB::table('water_registers')->select('date',DB::raw('sum(value) as total'))
                        ->whereBetween('date',[$last,$first])
                        ->where('state','=','Mendoza') //buscar su zona
                        ->where('user_id', '=', '1')
                        ->groupBy('date') //ordeno de mayor a menor
                        ->get();
        dd($consumption);
  }
  public static function showHourConsumptionGraph() { //consumo por hora
        $first = date("H:i:s");
        $last = date("H:i:s",strtotime('-6 Hour'));   //ver el rango de horas
        //echo $last;

        $consumption = DB::table('water_registers')->select('time',DB::raw('sum(value) as total'))
                        ->whereBetween('time',[$last,$first])
                        ->where('state','=','Mendoza') //buscar su zona
                        ->where('user_id', '=', '1')
                        ->groupBy('time') //ordeno de mayor a menor
                        ->get();
        dd($consumption);
        //conviene guardar la hora en vez de la hora completa..
  }




}
