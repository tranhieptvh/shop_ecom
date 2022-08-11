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
            'phone' => 'bail|numeric|nullable',
            'email' => 'bail|email|nullable',
            'vat' => 'bail|required|numeric',
            'ship_fee' => 'bail|required|numeric',
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
            'ship_fee' => ' Phí ship',
        ];
    }
}
