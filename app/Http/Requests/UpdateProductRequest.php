<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products,name,'.$this->id,
            'slug' => 'bail|required|unique:products,slug,'.$this->id,
            'price' => 'bail|required|numeric',
            'category_id' => 'bail|required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'slug' => 'Slug',
            'price' => 'Giá',
            'category_id' => 'Danh mục',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace(',', '', $this->price),
        ]);
    }
}