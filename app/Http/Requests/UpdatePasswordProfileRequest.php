<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordProfileRequest extends Request
{
    /**
     * Create a new CouponRequest instance.
     */
    public function __construct(Factory $factory)
    {
        $factory->extend('check_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
    }

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
            'currentPassword' => 'required|min:6|max:255|check_password:' . Auth::user()->password,
            'newPassword' => 'required|min:6|max:255',
            'confirmPassword' => 'required|min:6|max:255|same:newPassword'
        ];
    }

    /**
     * Get the validation messages that apply to request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'check_password' => 'The field does not match current password.'
        ];
    }
}
