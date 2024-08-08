<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Altere para sua lógica de autorização, se necessário
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'comunidade_id' => 'required|exists:comunidades,id',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages(): array
    {
        return [
            'comunidade_id.required' => 'O campo comunidade é obrigatório.',
            'comunidade_id.exists' => 'A comunidade selecionada não existe.',
        ];
    }
}
