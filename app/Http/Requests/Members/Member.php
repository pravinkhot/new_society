<?php

namespace App\Http\Requests\Members;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Member extends FormRequest
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
        $memberID = $request->route('member');
        return [
            'first_name' => ['required','max:50'],
            'middle_name' => ['max:50'],
            'last_name' => ['required','max:50'],
            'gender' => 'required',
            'dob' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($memberID)
            ],
            'mobile_no' => [
                'required',
                'integer',
                'digits:10'
            ],
            'role_id' => 'required'
        ];
        return [];
    }

    /**
     * Get the validation messages that apply to the validation request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile_no.integer' => 'The mobile no must be a number.'
        ];
    }
}
