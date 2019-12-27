<?php

namespace App\Http\Requests\Incomes\Category;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class IncomeCategory extends FormRequest
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
        $incomeCategoryID = $request->route('category');
        return [
            'name' => [
                'required',
                Rule::unique('income_category')->ignore($incomeCategoryID)
            ],
            'status' => [
                'required'
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
            'status.required' => 'Please select status.'
        ];
    }
}
