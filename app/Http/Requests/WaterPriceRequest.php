<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\WaterPrice;

class WaterPriceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

      $http_method = $this->method();

      if($http_method == 'POST') {

        return [
          'description' => 'alpha_dash|max:32',
          'price' => 'required|numeric|unique:water_prices,price',
          'active' => 'boolean',
        ];

      } else if ($http_method == 'PUT') {

          $price = WaterPrice::select('id')->where('price','=',$this->price)->first();
          return [
            'description' => 'alpha_dash|max:32',
            'price' => 'required|numeric|unique:water_prices,price,'.$price->id,
            'active' => 'boolean',
          ];

      }

    }

}
