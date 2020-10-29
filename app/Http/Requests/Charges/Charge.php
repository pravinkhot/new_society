<?php

namespace App\Http\Requests\Charges;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Charge extends FormRequest
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
            'charge_period_id' => 'required',
            'invoice_type_id' => 'required',
            'charge_type' => 'required|in:fix,measurement',
            'bill_group_id' => 'required_if:charge_type,fix',
            'measurementAmount' => 'exclude_unless:charge_type,measurement|required|regex:/^\d*(\.\d{2})?$/',
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
            'charge_period_id.required' => 'Please select charge period.',
            'invoice_type_id.required' => 'Please select invoice option.',
            'charge_type.required' => 'Please select charge type.',
            'bill_group_id.required' => 'The bill group field is required when charge type is fix.',
            'measurementAmount.required' => 'The charges per sq. foot field is required when charge type is measurement.',
            'measurementAmount.regex' => 'Please enter valid amount like xx.xx',
        ];
    }
}
