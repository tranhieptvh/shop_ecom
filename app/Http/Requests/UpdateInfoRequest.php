<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
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
            'phone' => 'bail|required|numeric',
            'address' => 'bail|required',
            'email' => 'bail|required|email',
            'bank' => 'bail|required',
            'vat' => 'bail|required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'email' => 'Email ',
            'bank' => 'Ngân hàng',
            'vat' => 'VAT',
        ];
    }
}
