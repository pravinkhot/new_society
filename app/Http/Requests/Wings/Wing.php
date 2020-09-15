<?php

namespace App\Http\Requests\Wings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Wing extends FormRequest
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
        $wingId = $request->route('wing');
        return [
            'name' => [
                'required',
                'max:50',
                Rule::unique('wings')->ignore($wingId)
                    ->where(function ($query) {
                        return $query
                            ->where('society_id', \Session::get('user.society_id'))
                            ->whereNull('deleted_at');
                    })
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
            'name.required' => 'The wing name is required.',
            'name.unique' => 'This wing name is already exist. Please try another.',
        ];
    }
}
