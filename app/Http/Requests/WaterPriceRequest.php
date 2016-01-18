<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
    public function rules()
    {
        return [
          'description' => 'alpha_dash|max:32',
          'price' => 'required|numeric|unique:water_prices,value',
        ];
    }
}
