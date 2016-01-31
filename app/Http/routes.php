<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
  
Route::auth();

/*Admin dashboard*/
Route::get('dashboard',['as' => 'dashboard.index', 'uses' => 'AdminReportsController@index']);
Route::get('dashboard/users',['as' => 'dashboard.users', 'uses' => 'AdminReportsController@showRegisteredUsers']);
Route::get('dashboard/total',['as' => 'dashboard.total', 'uses' => 'AdminReportsController@showWaterConsumption']);
Route::get('dashboard/hour',['as' => 'dashboard.water.hour', 'uses' => 'AdminReportsController@showWaterConsumptionPerHour']);
Route::get('dashboard/largest',['as' => 'dashboard.largest', 'uses' => 'AdminReportsController@showLargestStateConsumer']);
Route::get('dashboard/month',['as' => 'dashboard.month', 'uses' => 'AdminReportsController@showTotalMonthConsumption']);

Route::get('dashboard/cities/month',['as' => 'dashboard.graph.cities', 'uses' => 'AdminReportsController@showCitiesMonthsConsumptionGraph']);
Route::get('dashboard/cities/day',['as' => 'dashboard.graph.days', 'uses' => 'AdminReportsController@showCitiesDaysConsumptionGraph']);


/*Client*/
Route::get('home',['as' => 'home.index', 'uses' => 'ClientReportsController@index']);
Route::get('home/month',['as' => 'home.month', 'uses' => 'ClientReportsController@showTotalMonthConsumption']);
Route::get('home/city',['as' => 'home.city', 'uses' => 'ClientReportsController@showCityConsumption']);
Route::get('home/day',['as' => 'home.day', 'uses' => 'ClientReportsController@showWaterConsumption']);
Route::get('home/price',['as' => 'home.price', 'uses' => 'ClientReportsController@showWaterPrice']);
Route::get('home/bill',['as' => 'home.bill', 'uses' => 'ClientReportsController@showWaterBill']);
Route::get('home/graphs/day',['as' => 'home.graphs.day', 'uses' => 'ClientReportsController@showDayConsumptionGraph']);
Route::get('home/graphs/hour',['as' => 'home.graphs.hour', 'uses' => 'ClientReportsController@showHourConsumptionGraph']);

/*User Profile*/
Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile/{id}', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

/*Information*/
Route::get('info',['as' => 'info', 'uses' => 'InfoController@index']);


/*Users*/
Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('users/data', ['as' => 'users.getDatatable', 'uses' => 'UsersController@getDatatable']);
Route::get('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
Route::post('users', ['as' => 'users.create', 'uses' => 'UsersController@store']);
Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::put('users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
Route::delete('users/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);

/*Water_prices*/
Route::get('water-prices', ['as' => 'water-prices.index', 'uses' => 'WaterPricesController@index']);
Route::get('water-prices/data', ['as' => 'water-prices.getDatatable', 'uses' => 'WaterPricesController@getDatatable']);
Route::get('water-prices/create',['as' => 'water-prices.create', 'uses' => 'WaterPricesController@create']);
Route::post('water-prices',['as' => 'water-prices.store', 'uses' => 'WaterPricesController@store']);
Route::get('water-prices/{id}',['as' => 'water-prices.show', 'uses' => 'WaterPricesController@show']);
Route::get('water-prices/{id}/edit',['as'=>'water-prices.edit','uses' => 'WaterPricesController@edit']);
Route::put('water-prices/{id}',['as' => 'water-prices.update','uses' => 'WaterPricesController@update']);
Route::delete('water-prices/{id}',['as' => 'water-prices.delete', 'uses' => 'WaterPricesController@delete']);

/*export data*/
Route::get('export',['as' => 'export.index', 'uses' => 'ExportDataController@index']);
Route::get('export/download',['as' => 'export.download', 'uses' => 'ExportDataController@download']);

});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
