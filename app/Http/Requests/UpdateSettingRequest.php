<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Setting;

class UpdateSettingRequest extends Request
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
            'contactEmail' => 'required|max:255|email',
            'googleAnalytics' => 'max:65535',
            'imageMaxUploadSize' => 'required|integer',
            'imageDisplayLimit' => 'required|integer',
            'facebookUrl' => 'max:255|url',
            'twitterUrl' => 'max:255|url',
            'instagramUrl' => 'max:255|url',
            'pinterestUrl' => 'max:255|url',
            'registerEnabled' => 'required|boolean',
            'facebookRegisterEnabled' => 'required|boolean',
            'twitterRegisterEnabled' => 'required|boolean',
            'instagramRegisterEnabled' => 'required|boolean',
            'pinterestRegisterEnabled' => 'required|boolean',
            'loginEnabled' => 'required|boolean',
            'facebookLoginEnabled' => 'required|boolean',
            'twitterLoginEnabled' => 'required|boolean',
            'instagramLoginEnabled' => 'required|boolean',
            'pinterestLoginEnabled' => 'required|boolean',

        ];
    }
}
