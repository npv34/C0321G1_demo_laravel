<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống ',
            'name.max' => 'Trường này không quá 10 ký tự ',
            'email.required' => 'Trường này không được để trống ',
            'email.email' => 'Email không đúng định dạng ',
        ];
    }
}
