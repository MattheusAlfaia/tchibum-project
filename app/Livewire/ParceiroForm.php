<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Parceiro;

class ParceiroForm extends Component
{
    public $nome;
    public $email;
    public $seguimento;
    public $responsavel;
    public $cargo;
    public $cnpj;
    public $cadastur;
    public $endereco;
    public $cep;
    public $mensagem;
    public $accepted_terms = false;
    public $cidade;
    public $comunidade;
    public $numero;

    protected $rules = [
        'nome' => 'required|string|min:3',
        'email' => 'required|email',
        'seguimento' => 'required|string',
        'responsavel' => 'required|string|min:3',
        'cargo' => 'required|string|min:3',
        'cadastur' => 'nullable|string|max:20',
        'endereco' => 'required|string|min:3',
        'cep' => 'required|string|size:8',
        'cnpj' => 'nullable|string|cnpj_format',
        'mensagem' => 'nullable|string|max:1000',
        'accepted_terms' => 'accepted',
        'cidade' => 'required|string|min:3',
        'comunidade' => 'required|string|min:3',
        'numero' => 'required|string|min:9',
    ];

    protected $messages = [
        'nome.required' => 'O campo Nome da Empresa é obrigatório.',
        'nome.min' => 'O Nome da Empresa deve ter pelo menos 3 caracteres.',
        'email.required' => 'O campo Email é obrigatório.',
        'email.email' => 'O Email deve ser um endereço de e-mail válido.',
        'seguimento.required' => 'O campo Seguimento é obrigatório.',
        'responsavel.required' => 'O campo Responsável é obrigatório.',
        'responsavel.min' => 'O Responsável deve ter pelo menos 3 caracteres.',
        'cargo.required' => 'O campo Cargo é obrigatório.',
        'cargo.min' => 'O Cargo deve ter pelo menos 3 caracteres.',
        'cnpj.cnpj_format' => 'O CNPJ deve ser um CNPJ válido com 14 dígitos numéricos.',
        'cadastur.max' => 'O Cadastur não pode ter mais de 20 caracteres.',
        'endereco.required' => 'O campo Endereço é obrigatório.',
        'endereco.min' => 'O Endereço deve ter pelo menos 3 caracteres.',
        'cep.required' => 'O campo CEP é obrigatório.',
        'cep.size' => 'O CEP deve ter exatamente 8 caracteres.',
        'mensagem.max' => 'A Mensagem não pode ter mais de 1000 caracteres.',
        'accepted_terms.accepted' => 'Você deve aceitar os termos.',
        'cidade.required' => 'O campo Cidade é obrigatório.',
        'cidade.min' => 'A Cidade deve ter pelo menos 3 caracteres.',
        'comunidade.required' => 'O campo Comunidade é obrigatório.',
        'comunidade.min' => 'A Comunidade deve ter pelo menos 3 caracteres.',
        'numero.required' => 'O campo Número é obrigatório.',
        'numero.min' => 'O Número deve ter pelo menos 9 caracteres.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validateNome() {
        $this->validateOnly('nome');
    }

    public function validateEmail() {
        $this->validateOnly('email');
    }

    public function validateSeguimento() {
        $this->validateOnly('seguimento');
    }

    public function validateResponsavel() {
        $this->validateOnly('responsavel');
    }

    public function validateCargo() {
        $this->validateOnly('cargo');
    }

    public function validateCnpj() {
        $this->validateOnly('cnpj');
    }

    public function validateCadastur() {
        $this->validateOnly('cadastur');
    }

    public function validateEndereco() {
        $this->validateOnly('endereco');
    }

    public function validateCep() {
        $this->validateOnly('cep');
    }

    public function validateMensagem() {
        $this->validateOnly('mensagem');
    }

    public function validateAcceptedTerms() {
        $this->validateOnly('accepted_terms');
    }

    public function validateCidade() {
        $this->validateOnly('cidade');
    }

    public function validateComunidade() {
        $this->validateOnly('comunidade');
    }

    public function validateNumero() {
        $this->validateOnly('numero');
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['accepted_terms'] = $this->accepted_terms ? 1 : 0;

        Parceiro::create($validatedData);

        $this->resetForm();

        session()->flash('message', 'Sua mensagem foi enviada com sucesso!');
    }

    public function resetForm()
    {
        $this->reset([
            'nome',
            'email',
            'seguimento',
            'responsavel',
            'cargo',
            'cnpj',
            'cadastur',
            'endereco',
            'cep',
            'mensagem',
            'accepted_terms',
            'cidade',
            'comunidade',
            'numero'
        ]);
    }
    public function render()
    {
        return view('livewire.parceiro-form');
    }
}
