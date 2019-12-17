<?php

namespace App\Http\Requests\Services;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Service extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => [
                'required',
                'max:50'
            ],
            'provider_name' => [
                'required',
                'max:50'
            ],
            'category' => [
                'max:50'
            ],
            'mobile_no' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10'
            ],
            'email' => [
                'sometimes',
                'nullable',
                'email'
            ],
            'name' => [
                'required',
                'max:50'
            ],
        ];
    }

    /**
     * Get the validation messages that apply to the validation request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please enter service name.',
            'name.max' => 'Service name should not be greater than 50 character.',
            'provider_name.required' => 'Please enter provider name.',
            'provider_name.max' => 'Provider name should not be greater than 50 character.',
            'mobile_no.required' => 'Please enter mobile no.',
            'mobile_no.min' => 'The mobile number must be at least 10 digit.',
            'mobile_no.regex' => 'Please enter valid mobile number.',
            'email.email' => 'Please enter valid email address.'
        ];
    }
}
