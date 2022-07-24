<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products,name',
            'slug' => 'bail|required|unique:products,slug',
            'price' => 'bail|required|numeric',
            'category_id' => 'bail|required|numeric',
            'main' => 'bail|required',
            'volume' => 'bail|numeric',
            'concentration' => 'bail|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'slug' => 'Slug',
            'price' => 'Giá',
            'category_id' => 'Danh mục',
            'main' => 'Hình ảnh',
            'volume' => 'Thể tích',
            'concentration' => 'Nồng độ',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace(',', '', $this->price),
        ]);
    }
}
