@extends('layout')
@section('title','Parceiros')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('/storage/' . $parceiros_page->imagem_principal) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Parceiros <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Parceiros</h1>
                <a href="#parceiros"> <i class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<section id="parceiros" class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12 d-flex">
                <div class="info box2 p-4 text-center">
                    <p>Precisa de alguma orientação ou<br>alguma pergunta? Nós estamos disponíveis</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="parceiros" class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12 d-flex">
                <div class="info2 box2 p-4 text-center">
                    <p>Ou escreva sua mensagem aqui</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if(session()->has('message'))
    <div class="container alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<section class="ftco-section contact-section ftco-no-pt">
    <div class="container">
        <div class="row block-9">
            <div id="block" class="col-md-12 order-md-last d-flex">
                <form action="{{ route('parceiros.mensagem') }}" method="POST" class="bg-light p-5 contact-form">
                    @csrf

                    <!-- Informações da Empresa -->
                    <div class="form-section">
                        <h3>Informações da Empresa</h3>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nome da Empresa</label>
                                <input name="nome" type="text" class="form-control" required>
                                @error('nome')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>CNPJ</label>
                                <input name="cnpj" type="text" class="form-control" placeholder="00.000.000/0000-00">
                                @error('cnpj')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Endereço</label>
                                <input name="endereco" type="text" class="form-control" required>
                                @error('endereco')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>CEP</label>
                                <input name="cep" type="text" class="form-control" placeholder="00000-000" required>
                                @error('cep')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Cadastur</label>
                                <input name="cadastur" type="text" class="form-control">
                                @error('cadastur')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Seguimento</label>
                                <select name="seguimento" class="form-control" required>
                                    <option value="turismo">Turismo</option>
                                    <option value="hospedagem">Hospedagem</option>
                                    <option value="guia_turistico">Guia Turístico</option>
                                    <option value="gastronomia">Gastronomia</option>
                                    <option value="artesanato">Artesanato</option>
                                </select>
                                @error('seguimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informações de Contato -->
                    <div class="form-section">
                        <h3>Informações de Contato</h3>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Seu Email</label>
                                <input name="email" type="email" class="form-control" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Responsável</label>
                                <input name="responsavel" type="text" class="form-control" required>
                                @error('responsavel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Cargo</label>
                                <input name="cargo" type="text" class="form-control" required>
                                @error('cargo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Cidade</label>
                                <input name="cidade" type="text" class="form-control" required>
                                @error('cidade')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Comunidade</label>
                                <input name="comunidade" type="text" class="form-control" required>
                                @error('comunidade')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Número (WhatsApp)</label>
                                <input name="numero" type="text" class="form-control" required>
                                @error('numero')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Mensagem -->
                    <div class="form-section">
                        <h3>O que te motiva a ser nosso Parceiro?</h3>
                        <div class="form-group">
                            <label>Deixe uma breve apresentação</label>
                            <textarea name="mensagem" class="form-control"></textarea>
                            @error('mensagem')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Termos e Envio -->
                    <div class="form-section">
                        <div class="form-group">
                            <input name="accepted_terms" type="checkbox" required>
                            <label>Termos Aceitos</label>
                            @error('accepted_terms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar" class="btn btn-primary py-3 px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    #block, #map {
        border-radius: 20px;
        margin-top: 10px;
    }

    #whatsapp {
        cursor: pointer;
    }

    .box2 {
        width: 100%;
        display: block;
        background: white;
    }

    .info {
        margin-bottom: -100px;
        font-size: 20px;
        color: #f4bc08;
    }

    .info2 {
        font-size: 20px;
        color: #f4bc08;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section h3 {
        margin-bottom: 20px;
        font-size: 1.5rem;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>


@endsection
