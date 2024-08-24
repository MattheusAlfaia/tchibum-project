<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParceirosRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:parceiros,email',
            'seguimento' => 'required|string|in:turismo,hospedagem,guia_turistico',
            'responsavel' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'cnpj' => 'nullable|string|size:18|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/',
            'cadastur' => 'nullable|string|max:255',
            'endereco' => 'required|string|max:255',
            'cep' => 'required|string|size:9|regex:/^\d{5}\-\d{3}$/',
            'mensagem' => 'nullable|string',
            'accepted_terms' => 'required|accepted',
        ];
    }
}
