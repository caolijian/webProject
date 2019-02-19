<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ArticleRequest extends FormRequest
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
        //$id = $this->route('article');
        return [
            'title' => [
                'required',
//                Rule::unique('articles')->ignore($id)
            ],
            'desc' => 'required',
            'cover' => 'sometimes|image',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文摘标题不能为空！',
            'desc.required' => '文摘简介不能为空！',
            'content.required' => '文摘内容不能为空！',
        ];
    }
}
