<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        /*
        Manter o mesmo email durante edição do usuário no update ainda usando a regra unique
        */
        if($this->getMethod("PUT"))
        {
            $rules = [               
                'name' => [
                    'required'
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($this->painel_usuario)
                ],
                'password' => [
                    'required',
                    'min:3',
                    'confirmed'
                ]
            ];

            return $rules;

        }


        return [
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:3|confirmed'
            //'password_confirmation' => 'required|confirmed'                 
        ];
    }
}
