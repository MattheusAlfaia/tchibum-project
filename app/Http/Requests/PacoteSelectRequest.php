<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacoteSelectRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Defina conforme necessário para autorização adicional
    }

    public function rules()
    {
        return [
            'comunidade_id' => 'required|exists:comunidades,id',
        ];
    }

    public function messages()
    {
        return [
            'comunidade_id.required' => 'O campo comunidade_id é obrigatório.',
            'comunidade_id.exists' => 'A comunidade selecionada não existe.',
        ];
    }
}

