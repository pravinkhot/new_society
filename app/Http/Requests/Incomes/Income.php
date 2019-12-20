<?php

namespace App\Http\Requests\Incomes;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Income extends FormRequest
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
        $incomeID = $request->route('income');
        return [
            'income_category_id' => [
                'required'
            ],
            'amount' => [
                'required',
                'regex: /^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'
            ],
            'payment_date' => [
                'required',
                'date_format:"d-m-Y"'
            ],
            'payment_mode_id' => [
                'required'
            ],
            'received_from' => [
                'required',
                'max:50'
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
            'income_category_id.required' => 'Please select income category.',
            'amount.required' => 'Please enter amount.',
            'amount.regex' => 'Please enter valid amount.',
            'payment_date.required' => 'Please select payment date.',
            'payment_date.date_format' => 'Please enter valid payment date.',
            'payment_mode_id.required' => 'Please select payment mode.',
            'cheque_no.required' => 'Please enter cheque no.'
        ];
    }
}
