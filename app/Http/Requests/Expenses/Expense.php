<?php

namespace App\Http\Requests\Expenses;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Expense extends FormRequest
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
            'expense_category_id' => [
                'required'
            ],
            'vendor_name' => [
                'required',
                'max:50'
            ],
            'bill_date' => [
                'required',
                'date_format:"d-m-Y"'
            ],
            'payment_date' => [
                'required',
                'date_format:"d-m-Y"'
            ],
            'amount' => [
                'required',
                'regex: /^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'
            ],
            'authorised_by' => [
                'required'
            ],
            'payment_mode_id' => [
                'required'
            ],
            'cheque_no' => Rule::requiredIf(function () use ($request) {
                if ($request->input('payment_mode_id') == 2) {
                    return true;
                }
            }),
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
            'type.required' => 'Please enter expense type.',
            'type.max' => 'Expense type should not be greater than 50 character.',
            'vendor_name.required' => 'Please enter vendor name.',
            'vendor_name.max' => 'Vendor name should not be greater than 50 character.',
            'bill_date.required' => 'Please select bill date.',
            'bill_date.date_format' => 'Please enter valid bill date.',
            'payment_date.required' => 'Please select payment date.',
            'payment_date.date_format' => 'Please enter valid payment date.',
            'amount.required' => 'Please enter amount.',
            'amount.regex' => 'Please enter valid amount.',
            'payment_mode_id.required' => 'Please select payment mode.',
            'cheque_no.required' => 'Please enter cheque no.'
        ];
    }
}
