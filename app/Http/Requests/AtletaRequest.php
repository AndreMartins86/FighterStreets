<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtletaRequest extends FormRequest
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
        return [
            'nome' => 'required|min:10',
            'cpf' => 'required|min:11|numeric|unique:App\Models\Atleta,cpf',
            'sexo_id' => 'required',
            'faixa_id' => 'required',
            'password' => 'required|confirmed',
            'dataNascimento' => 'required|date',
            'equipe' => 'required|min:3',
            'peso_id' => 'required',
            'email' => 'required|email|unique:App\Models\Atleta,email',
            'captcha' => 'required'
        ];
    }
}
