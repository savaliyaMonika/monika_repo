<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:4|max:8',
            'user' => 'required',
        ];
    }
    public function messages()
    {
        return [
                'name.required'=>'Name is required',
                'email.required'=>'Email is required',
                'user.required'=>'Select User is required',
                'password.required'=>'Password is required'
        ];
    }
    public function attributes()
    {
        return[
            'email'=>'Emailaddress'
        ];
    }
}
