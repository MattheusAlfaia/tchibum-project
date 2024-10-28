@extends('layout')
@section('title', 'Sobre')
@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('/images/sobre.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="overlay"></div>
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/">Home <i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>{{ trans('messages.sobre_nos') }} <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread" style="color: white; font-size: 2.2em; white-space: nowrap;">{{ trans('messages.sobre_nos') }}</h1>
                <a href="#sobre" class="scroll-down">
                    <i class="fa fa-angle-double-down fa-lg" style="color: white;" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Sobre Section -->
<section id="sobre" class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-6 col-md-12 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                <div class="w-100">
                    <span class="subtitletch">{{ trans('messages.sobre_titulo') }}</span>
                    <h2 class="mb-4" style="font-size: 1.8em;">{{ trans('messages.sobre') }}</h2>
                    <p class="paragrafo" style="font-size: 0.95em; line-height: 1.5;">{!! markdown($sobre->sobre) !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    @foreach (range(1, 4) as $i)
                        <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-{{ $i }} d-block img" style="background-image: url('{{ asset('/storage/' . $sobre->{'imagem_atividade_comunidade' . $i}) }}');">
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="font-size: 1.1em;">{{ trans('messages.sobre_nome_atividade_comunidade' . $i) }}</h3>
                                    <p class="descricao_atividade_comunidade" style="font-size: 0.95em; line-height: 1.4;">{{ trans('messages.sobre_descricao_atividade_comunidade' . $i) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section id="video" class="ftco-section ftco-about img" style="background-image: url('{{ asset('/storage/' . $sobre->capa_video_principal) }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="overlay"></div>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 400px;">
        <a href="{{ asset('/storage/' . $sobre->video_principal) }}" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4" style="font-size: 3em; color: white;">
            <span class="fa fa-play"></span>
        </a>
    </div>
</section>

<!-- Styles -->
<style>
    .hero-wrap {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    /* Fullheight class for hero section */
    .js-fullheight {
        height: 100vh;
    }

    /* Ajustes de estilo para evitar quebra de linha */
    .hero-wrap h1.bread {
        font-size: 2.2em;
        white-space: nowrap; /* Impede a quebra de linha */
        color: white;
    }

    /* Estilo das atividades */
    .services {
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        color: #fff;
    }

    /* Ajuste para o parágrafo da seção "Sobre" */
    .paragrafo {
        font-size: 0.95em;
        line-height: 1.6;
        margin-bottom: 15px;
        text-align: justify;
    }

    /* Ajustes para mobile */
    @media (max-width: 768px) {
        /* Estilo para o Hero */
        .hero-wrap h1.bread {
            font-size: 24px;
        }

        /* Seção das atividades */
        .services {
            height: 200px;
            padding: 15px;
        }

        /* Margens da seção Sobre */
        .ftco-section {
            padding: 20px 10px;
        }

        /* Seção de vídeo */
        #video {
            background-size: cover;
            min-height: 300px;
        }

        .paragrafo {
            font-size: 0.9em;
            line-height: 1.5;
        }
    }

    /* Ajustes para telas médias e grandes */
    @media (min-width: 992px) {
        .hero-wrap h1.bread {
            font-size: 48px;
        }

        .services {
            height: 300px;
        }
    }

    /* Scroll down animation */
    .scroll-down {
        animation: bounce 2s infinite;
        margin-top: 20px;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(10px);
        }
    }
</style>

@endsection
