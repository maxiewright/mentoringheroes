<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'nullable|required_without:email',
            'email' => 'nullable|required_without:phone|email',
            'details' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please provide your name',
            'phone.required_without' => 'Please provide and phone or email',
            'email.required_without' => 'Please provide and phone or email',
            'email.email' => 'Please enter a valid email address',
            'details.required' => 'Please let us know briefly how we can help',
        ];
    }
}
