<form wire:submit.prevent="submit" class="bg-light p-5 contact-form">
    <div class="form-section">
        <h3>Informações da Empresa</h3>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Nome da Empresa</label>
                <input wire:model.lazy="nome" wire:blur="validateNome" type="text" class="form-control" required>
                @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>CNPJ</label>
                <input wire:model.lazy="cnpj" wire:blur="validateCnpj" type="text" class="form-control" placeholder="00.000.000/0000-00">
                @error('cnpj') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Endereço</label>
                <input wire:model.lazy="endereco" wire:blur="validateEndereco" type="text" class="form-control" required>
                @error('endereco') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>CEP</label>
                <input wire:model.lazy="cep" wire:blur="validateCep" type="text" class="form-control" placeholder="00000-000" required>
                @error('cep') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Cadastur</label>
                <input wire:model.lazy="cadastur" wire:blur="validateCadastur" type="text" class="form-control">
                @error('cadastur') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Seguimento</label>
                <select wire:model.lazy="seguimento" wire:blur="validateSeguimento" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="turismo">Turismo</option>
                    <option value="hospedagem">Hospedagem</option>
                    <option value="guia_turistico">Guia Turístico</option>
                    <option value="gastronomia">Gastronomia</option>
                    <option value="artesanato">Artesanato</option>
                </select>
                @error('seguimento') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="form-section">
        <h3>Informações de Contato</h3>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Seu Email</label>
                <input wire:model.lazy="email" wire:blur="validateEmail" type="email" class="form-control" required>
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Responsável</label>
                <input wire:model.lazy="responsavel" wire:blur="validateResponsavel" type="text" class="form-control" required>
                @error('responsavel') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Cargo</label>
                <input wire:model.lazy="cargo" wire:blur="validateCargo" type="text" class="form-control" required>
                @error('cargo') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Cidade</label>
                <input wire:model.lazy="cidade" wire:blur="validateCidade" type="text" class="form-control" required>
                @error('cidade') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Comunidade</label>
                <input wire:model.lazy="comunidade" wire:blur="validateComunidade" type="text" class="form-control" required>
                @error('comunidade') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Número (WhatsApp)</label>
                <input wire:model.lazy="numero" wire:blur="validateNumero" type="text" class="form-control" required>
                @error('numero') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="form-section">
        <h3>O que te motiva a ser nosso Parceiro?</h3>
        <div class="form-group">
            <label>Deixe uma breve apresentação</label>
            <textarea wire:model.lazy="mensagem" wire:blur="validateMensagem" class="form-control"></textarea>
            @error('mensagem') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-section">
        <div class="form-group">
            <input wire:model="accepted_terms" wire:blur="validateAcceptedTerms" type="checkbox">
            <label>Termos Aceitos</label>
            @error('accepted_terms') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary py-3 px-5">
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</form>
