<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:category',
            'prioty' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống.',
            'prioty.required' => 'Thứ tự ưu tiên không được để trống.',
            'name.unique' => 'Danh mục đã có trong  Database',
        ];
    }
}
