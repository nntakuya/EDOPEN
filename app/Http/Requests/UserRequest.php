<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize()
    {
        if ($this->path() == 'users/sign_up') {
            return true ;
        } else {
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'email',
            'password' =>'required',
        ];
    }

    public function messages(){
        return  [
            'email.email' =>'メールアドレスが必要です。',
            'password.required' => 'パスワードは必ず入力してください。',
        ];
    }
}
