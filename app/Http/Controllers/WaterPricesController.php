<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WaterPrice;
use App\Http\Requests\WaterPriceRequest;
use App\Models\Role;
use Datatables;

class WaterPricesController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
      $role = Role::where('name','admin')->first();
      $this->authorize('auth',$role);
  }

  public static function index() {
      return view ('water-prices.index');
  }
  public static function getDatatable() {

    $water_prices = WaterPrice::select(['id','description','price', 'active','updated_at'])->get();
    $datatable = Datatables::of($water_prices);
    $datatable->addColumn('actions', '<a href="{{ URL::to(\'water-prices/\' . $id.\'/edit\') }}" class="btn btn-default" title="Editar" ><i class="fa fa-edit"></i></a>
                                      <a href="#deleteModal" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-danger delete-link" data-href="{{ URL::to(\'water-prices/\' . $id) }}" title="Eliminar" ><i class="fa fa-trash"></i></a>');

    return $datatable->make(true);
  }
  public static function create() {
      return view ('water-prices.create');
  }
  public static function store(WaterPriceRequest $request) {

      $price = new WaterPrice;
      $price->description = $request->input('description');
      $price->price = $request->input('price');
      $price->save();

      return redirect()->route('water-prices.index')->with('success', 'El registro ha sido almacenado correctamente');

  }

  public static function show($id) {

  }

  public static function edit($id) {

      $price = WaterPrice::find($id);
      if(!$price) {
        return redirect()->back()->withInput()->withErrors('No se ha encontro el registro seleccionado');
      }
      $data = [
        'price' => $price,
      ];

      return view ('water-prices.edit')->with($data);
  }

  public static function update (WaterPriceRequest $request, $id) {

      $price = WaterPrice::find($id);
      if (!$price) {
        return redirect()->back()->withInput()->withErrors('No se ha encontro el registro seleccionado');
      }

      if ($request->input('active') == '') {        //debe existir al menos un precio activo
      $active = WaterPrice::whereNotIn('id',[$id])->active()->first();
      if (!$active) {
        return redirect()->back()->withInput()->withErrors('Debe haber al menos un registro de precio ACTIVO');
        }
      }

      $price->description = $request->input('description');
      $price->price = $request->input('price');
      $price->active = $request->input('active');
      $price->save();

      return redirect()->route('water-prices.index')->with('success', 'El registro ha sido almacenado correctamente');


  }

  public static function delete(Request $request, $id) {

    $price = WaterPrice::find($id);
    if (!$price) {
        return redirect()->back()->withErrors('El registro seleccionado no existe');
    }
    $price->delete();
    if ($request->ajax()) {
        return response()->json(['code' => 200]);
    }
    else {
        return redirect()->route('water-prices.index')->with('success','El registro se ha eliminado correctamente');
    }

  }

}
