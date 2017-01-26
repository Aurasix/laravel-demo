<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends Request
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
        $rules = User::$rules;
        $id = Auth::user()->id;
        $rules['username'] .= ',' . $id;
        $rules['email'] .= ',' . $id;

        #Removin role rule
        unset($rules['role']);

        return $rules;
    }
}
