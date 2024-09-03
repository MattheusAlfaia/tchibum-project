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
                    <p>O turismo pode ser uma força positiva para a conservação da Amazônia.<br> Ao se tornar nosso parceiro, você contribuirá para a geração de renda, a preservação da cultura e o desenvolvimento local.</p>
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
                    <p>Quer saber mais? Entre em contato:</p>
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
                <livewire:parceiro-form />
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
