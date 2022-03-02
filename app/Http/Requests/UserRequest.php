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
            'password' => 'required|confirmed|min:8|max:20',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden.',
            'password.min' => 'La contraseña debe contener entre 8 y 20 caracteres.',
            'password.max' => 'La contraseña debe contener entre 8 y 20 caracteres.',
        ];
    }
}