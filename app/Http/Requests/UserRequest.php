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
        $rules = [
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ];

        if (\Route::currentRouteName() == 'user.update') {
            $rules['email'] .= ','.$this->id;
            if ($this->attributes->has('password') == true) {
                $rules['password'] .= ','.'required|confirmed|min:6';
            }
        }

        return $rules;
    }
}
