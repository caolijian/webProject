<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
        $id = $this->route('book');
        return [
            'title' => [
                'required',
                Rule::unique('books')->ignore($id)
            ],
            'desc' => 'required',
            'picture' => 'sometimes|image',
            'content' => 'required',
            'author' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空！',
            'desc.required' => '简介不能为空！',
            'author.required' => '作者不能为空！',
            'content.required' => '内容不能为空！',
        ];
    }
}
