<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WaterRegister;
use App\Models\User;
use App\Models\Role;
use Datatables;
use Gate;
use DB;
use Session;
use stdClass;

class AdminReportsController extends Controller {

  public function __construct() {

      $role = Role::where('name','admin')->first();   //Mejor guardar el role en la session
      $this->middleware('auth');
      $this->authorize('auth',$role);
      $this->middleware('session');

}

  public static function index() {
    
    return view('dashboard.index');
  }

  public static function getDatatable() {

      /*number of users*/
      $users = User::select('id')->active()->count();

      /*consumption*/
      $today = date("Y-m-d");

      $id = Session::get('user_id');
      $user = User::select(['state_id'])->with('state')
                              ->where('id', $id)
                              ->first();
      $state = $user->state->name;

      $consumption = WaterRegister::where('date', '=', $today)
                        ->where('state', '=', $state)
                        ->sum('value');

      /*consumption per hour*/
      $consumptionPerHour = $consumption/60;

      /*largest consumer*/
      $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                          ->where('date', '=', $today)
                          ->where('state','=', $state)
                          ->orderBy('total','desc') //ordeno de mayor a menor
                          ->groupBy('city')
                          ->get();
      //manejar errores
     $largestConsumer = reset($consumers);  //1er elemento, mayor
     $smallestConsumer = end($consumers);  //ultimo elemento, menor


     /*Total month consumption*/
     $first_day = date("Y-m-01");
     $last_day = date("Y-m-t");

     $totalConsumption = WaterRegister::where('state','=', $state)
                           ->whereBetween('date',[$first_day,$last_day])
                           ->sum('value');

     $aux = new StdClass;
     $aux->users = $users;
     $aux->consumption = $consumption;
     $aux->consumptionPerHour = $consumptionPerHour;
     $aux->largestConsumer = $largestConsumer->city;
     $aux->smallestConsumer = $smallestConsumer->city;
     $aux->totalConsumption = $totalConsumption;

     $data = [collect($aux)];   //hack super villa, para transformar a coleccion de datos

    $datatable = Datatables::of(collect($data));
    return $datatable->make(true);


  }

  public static function showCitiesMonthsConsumptionGraph() { //todas las ciudades en el mes
        $today = date("Y-m-d");
        $first_day = date("Y-m-01");
        $last_day = date("Y-m-t");
        $id = Session::get('user_id');

        $user = User::select(['state_id'])->with('state')
                                ->where('id', $id)
                                ->first();
        $state = $user->state->name;

        $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                        ->whereBetween('date',[$first_day,$last_day])
                        ->where('state','=',$state)
                        ->orderBy('total','desc') //ordeno de mayor a menor
                        ->groupBy('city')
                        ->get();

//Google charts JSON's format
        $cols = [
          ["label"=>"Departamentos","type" => "string"],
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

        foreach ($consumers as $key => $value) {
              $param1['v'] = $consumers[$key]->city;
              $param2['v'] = $consumers[$key]->total;
              $rows['c'] = [$param1,$param2];
              $param3[] = $rows;
              $cell['rows'] = $param3;
        }

      return response()->json($cell);
  }

  public static function showCitiesDaysConsumptionGraph() {   //todos las ciudades en el dia
    $today = date("Y-m-d");
    $id = Session::get('user_id');

    $user = User::select(['state_id'])->with('state')
                            ->where('id', $id)
                            ->first();
    $state = $user->state->name;

    $consumers = DB::table('water_registers')->select('city',DB::raw('sum(value) as total'))
                        ->where('date', '=', $today)
                        ->where('state','=', $state)
                        ->orderBy('total','desc') //ordeno de mayor a menor
                        ->groupBy('city')
                        ->get();

    //Google charts JSON's format
    $cols = [
      ["label"=>"Departamentos","type" => "string"],
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

    foreach ($consumers as $key => $value) {
          $param1['v'] = $consumers[$key]->city;
          $param2['v'] = $consumers[$key]->total;
          $rows['c'] = [$param1,$param2];
          $param3[] = $rows;
          $cell['rows'] = $param3;
    }

    return response()->json($cell);
  }


}
