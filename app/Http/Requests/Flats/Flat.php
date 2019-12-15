<?php

namespace App\Http\Requests\Flats;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Flat extends FormRequest
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
        $flatID = $request->route('flat');
        return [
            'flat_no' => [
                'required',
                'max:50',
                Rule::unique('flats')->ignore($flatID)->where(function ($query) use ($request) {
                    return $query->where('wing_id', $request->input('wing_id'));
                })
            ],
            'wing_id' => ['required'],
            'sq_foot' => ['regex:/^\d*(\.\d{2})?$/'],
            'flat_status_id' => 'required',
            'owner_fn' => 'required',
            'owner_ln' => 'required',
            'owner_number' => [
                'required',
                'integer',
                'digits:10'
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
            'owner_fn.required' => 'The owner first name field is required.',
            'owner_ln.required' => 'The owner last name field is required.',
            'owner_number.integer' => 'The mobile no must be a number.',
            'sq_foot.regex' => 'Please enter valid number like XXXXX.XX'
        ];
    }
}
