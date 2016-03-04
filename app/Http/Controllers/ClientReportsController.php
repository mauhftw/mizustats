<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WaterRegister;
use App\Models\WaterPrice;
use App\Models\Role;
use App\Models\City;
use DB;
use Datatables;
use stdClass;


class ClientReportsController extends Controller {

  public function __construct()
  {
    $role = Role::where('name','user')->first();
    $this->middleware('auth');
    $this->authorize('auth',$role);
  }

  public static function index() {
      return view('home.index');
  }

  public static function getDatatable() {

        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");
        $today = date("Y-m-d");

        /* MONTH user consumption*/
        $monthUserConsumption = WaterRegister::where('state','=','Mendoza') //reemplazar por session(user_id)
                              ->where('user_id','=','1')  //reemplazar por session(user_id)
                              ->whereBetween('date',[$first_day,$last_day])
                              ->sum('value');

        /* MONTH city consumption total and average lts/hour*/
        $cityConsumption = WaterRegister::select(DB::raw('sum(value) as total, avg(value) as avg'))
                              ->where('city','=','Godoycruz') //reemplazar por city
                              ->whereBetween('date',[$first_day,$last_day])
                              ->groupBy('city')
                              ->get();

        $cityTotalConsumption = $cityConsumption[0]->total;
        $cityAverage = $cityConsumption[0]->avg;

        /*current consumption and liters per hour (DAY)*/
        $consumption = WaterRegister::where('date', '=', $today)
                          ->where('user_id', '=', '1')  //traer user id de la session
                          ->sum('value');
        $consumptionPerHour = $consumption/60;

        /*water price*/
        $waterPrice = WaterPrice::select('price')->active()->get();

        /*water bill*/
        $price = $waterPrice[0]->price;
        $liters = WaterRegister::where('date', '=', $today)
                          ->where('user_id', '=', '1')  //traer user id de la session
                          ->sum('value');

        $bill = $liters*$price;

        $aux = new stdClass;
        $aux->monthUserConsumption = $monthUserConsumption;
        $aux->cityTotalConsumption = $cityTotalConsumption;
        $aux->cityAverage = $cityAverage;
        $aux->consumptionPerHour = $consumptionPerHour;
        $aux->consumption = $consumption;
        $aux->waterPrice = $price;
        $aux->bill = $bill;

        $data = [collect($aux)];

        $datatable = Datatables::of(collect($data));
        return $datatable->make(true);

  }

  /*public static function showCityConsumption() { //total y promedio

      $first_day = date("Y-m-01");
      $last_day = date("Y-m-t");

      $city = User::with('city')->get();
            probar first();


      $cityConsumption = WaterRegister::select(DB::raw('count(id) as total, avg(value) as avg'))
                            ->where('city','=','Godoycruz') //reemplazar por city
                            ->whereBetween('date',[$first_day,$last_day])
                            ->groupBy('city')
                            ->get();

      //divido por 60 el avg y tengo litros por hora
  }

  public static function showCityAverageConsumption() {

      $first_day = date("Y-m-01");
      $last_day = date("Y-m-t");

      /*$city = User::with('city')->get();
            probar first();
      */
      /*city average consumption
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

  } */

  public static function showDayConsumptionGraph() { //consumo de los dias de la semana
        $first = date("Y-m-d");
        $last = date("Y-m-d",strtotime('-6 day'));
        //echo $last;
        $consumption = DB::table('water_registers')->select('date',DB::raw('sum(value) as total'))
                        ->whereBetween('date',[$last,$first])
                        ->where('state','=','Mendoza') //buscar su zona
                        ->where('user_id', '=', '1')
                        ->groupBy('date') //ordeno de mayor a menor
                        ->get();
        //dd($consumption);

        //Google charts JSON's format
                $cols = [
                  ["label"=>"Fecha","type" => "string"],
                  ["label"=>"Consumo","type" => "number"]
                ];

                $aux = [];
                $param1 = [];
                $param2 = [];
                $param3 = [];
                $param4 = [];
                $cell = [];
                $rows = [];
                $cell['cols'] = $cols;

                foreach ($consumption as $key => $value) {
                      $param1['v'] = $consumption[$key]->date;
                      $param2['v'] = $consumption[$key]->total;
                      $rows['c'] = [$param1,$param2];
                      $param3[] = $rows;
                      $cell['rows'] = $param3;
                }

              return response()->json($cell);
  }
  public static function showMonthConsumptionGraph() { //consumo por hora

        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");
        $previous_first_day = date("Y-m-01", strtotime('-1 month'));
        $previous_last_day = date("Y-m-t", strtotime('-1 month'));

        /*consumo del mes actual*/
        $currentMonthConsumption = WaterRegister::where('state','=','Mendoza') //reemplazar por session(user_id)
                              ->where('user_id','=','1')  //reemplazar por session(user_id)
                              ->whereBetween('date',[$first_day,$last_day])
                              ->sum('value');

        /*consumo del mes anterior*/
        $previousMonth = WaterRegister::where('state','=','Mendoza') //reemplazar por session(user_id)
                              ->where('user_id','=','1')  //reemplazar por session(user_id)
                              ->whereBetween('date',[$previous_first_day,$previous_last_day])
                              ->sum('value');


        $consumption = [
            ['month' => date('M',strtotime('-1 month')), 'value' => $previousMonth],
            ['month' => date('M'), 'value' => $currentMonthConsumption],
        ];

        //Google charts JSON's format
        $cols = [
          ["label"=>"Mes","type" => "string"],
          ["label"=>"Consumo","type" => "number"]
        ];

        $aux = [];
        $param1 = [];
        $param2 = [];
        $param3 = [];
        $param4 = [];
        $cell = [];
        $rows = [];
        $cell['cols'] = $cols;

        foreach ($consumption as $key => $value) {
              $param1['v'] = $consumption[$key]['month'];
              $param2['v'] = $consumption[$key]['value'];
              $rows['c'] = [$param1,$param2];
              $param3[] = $rows;
              $cell['rows'] = $param3;
        }

      return response()->json($cell);

  }




}
