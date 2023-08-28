<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'abbr' => 'required|string|max:10',
            // 'active' => 'required|in:0,1',
            'direction' => 'required|in:rtl,ltr'
        ];
    }
    public function messages()
    {
        return
            [
                'required' => 'This field is required',
                'in' => 'the input value is incorrect',
                'name.string' => 'The language name should be string',
                'name.max' => 'The max is 100',
                'abbr.max' => 'The max is 10',
                'abbr.string' => 'The abbr should be string'
            ];
    }
}
