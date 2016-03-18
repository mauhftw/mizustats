<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;
use Session;
class ClientRequest extends Request
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
        $id = Session::get('user_id');
        $user = User::where('id','=',$id)->first();
        return [
          'name' => 'required|between:2,32|alpha',
          'lastname' => 'required|between:2,32|alpha',
          'email' => 'required|email|max:128|unique:users,email,'.$user->id,
          'password' => 'required|min:6',
        ];
    }
}
