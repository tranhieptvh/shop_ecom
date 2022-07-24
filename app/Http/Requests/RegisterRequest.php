<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required',
            'date_of_birth' => 'bail|required',
            'phone' => 'bail|required|numeric',
            'address' => 'bail|required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'date_of_birth' => 'Ngày sinh',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
