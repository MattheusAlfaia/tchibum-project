<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacoteSaveRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Defina se necessário para autenticação ou autorização adicional
    }

    /**
     * Obtenha as regras de validação para a solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pacote_id' => 'required|exists:pacotes,id',
        ];
    }

    /**
     * Mensagens personalizadas de validação.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pacote_id.required' => 'O campo pacote_id é obrigatório.',
            'pacote_id.exists' => 'O pacote selecionado não existe.',
        ];
    }
}

