<?php

namespace App\Http\Requests\Notices;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Notice extends FormRequest
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
        $noticeID = $request->route('notice');

        return [
            'title' => [
                'required',
                'max:50',
                Rule::unique('notices')->ignore($noticeID)
            ],
            'type' => 'required',
            'end_date' => 'required',
            'document' => 'required|mimes:jpg,jpeg,png,pdf',
        ];
    }

    /**
     * Get the validation messages that apply to the validation request.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
