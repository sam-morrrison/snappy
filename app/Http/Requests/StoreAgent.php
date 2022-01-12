<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgent extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                Rule::unique('agents')->where('last_name', request('last_name'))
            ],
            'last_name' =>
                [
                    'required',
                    'string',
                    Rule::unique('agents')->where('first_name', request('first_name'))
                ],
            'phone' => 'required|string',
            'email' => 'required|email',
        ];

    }
}
