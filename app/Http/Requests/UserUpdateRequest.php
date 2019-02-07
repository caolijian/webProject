<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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

        $id = $this->route('user');
//        $id = Auth::user()->id;
        return [
            'name' => [
                'required',
                'max:15',
                Rule::unique('users')->ignore($id)
            ],
            'description' => 'required|between:3,255'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空！',
            'name.unique' => ':input 已经存在！！！！',
        ];
    }
}
