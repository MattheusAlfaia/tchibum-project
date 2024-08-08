<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensagemRequest extends FormRequest
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
            'nome_cliente' => 'required|string|max:255',
            'email_cliente' => 'required|email|max:255',
            'assunto_cliente' => 'required|string|max:255',
            'mensagem_cliente' => 'required|string',
        ];
    }
}
