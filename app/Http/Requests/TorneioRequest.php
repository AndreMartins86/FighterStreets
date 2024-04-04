<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TorneioRequest extends FormRequest
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
            'titulo' => 'required',
            'cidade' => 'required',
            'estado_id' => 'required',
            'data' => 'required',
            'tipo_id' => 'required',
            'ginasio' => 'required',
            'sobre' => 'required',
            'informacoes' => 'required',
            'imagem' => 'required',
            'arquivo' => 'required'
        ];
    }
}
