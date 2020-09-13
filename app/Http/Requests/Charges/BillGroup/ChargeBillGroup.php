<?php

namespace App\Http\Requests\Charges\BillGroup;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChargeBillGroup extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $chargeBillGroupID = $request->route('bill_group');
        return [
            'name' => [
                'required',
                Rule::unique('bill_group')->ignore($chargeBillGroupID)
            ],
            'particular.*' => [
                'required'
            ],
            'amount.*' => [
                'required',
                'regex:/^\d*(\.\d{2})?$/'
            ]
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
            'name.required' => 'Bill group name is required.',
            'name.unique' => 'The bill group name has already been taken.',
            'particular.*.required' => 'Particular name is required.',
            'amount.*.required' => 'Amount is required.',
            'amount.*.regex' => 'Please enter valid amount.',
        ];
    }
}
