<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $id = $this->id;
        return [
            'name' => 'bail|required|unique:categories,name,'.$id,
            'slug' => 'bail|required|unique:categories,slug,'.$id,
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh  mục',
            'slug' => 'Slug',
        ];
    }
}
