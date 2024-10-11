@extends('layout')
@section('title', 'Post')
@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-1 js-fullheight" style="background-image: url('{{ asset('/images/13.jpg') }}');">
    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.4);"></div> <!-- Leve sobreposição para melhorar a legibilidade -->
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-10 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/">Home <i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>Post <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">{{ $post->titulo }}</h1>
                <a href="#posts">
                    <i class="fa fa-angle-double-down fa-lg" style="color: white;" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Post Content Section -->
<section class="ftco-section ftco-about ftco-no-pt img" id="posts">
    <div class="container">
        <div class="row d-flex">
            <!-- Imagem Principal (5 colunas no desktop) -->
            <div class="col-lg-11 col-md-12 d-flex">
                <div id="img-post" class="col-md-12 d-flex align-items-stretch">
                    <div class="img w-100 align-items-center justify-content-center"
                        style="background-image:url('{{ asset('/storage/' . $post->imagem_principal) }}');">
                    </div>
                </div>
            </div>
        </div>
        <!-- Texto adicional abaixo da imagem (desktop) -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <p class="paragrafo">{!! markdown(nl2br(e($post->conteudo))) !!}</p> <!-- Texto continua abaixo da imagem no desktop -->
            </div>
        </div>
    </div>
</section>

<!-- Styles -->
<style>
    .hero-wrap {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        position: relative;
    }

    /* Fullheight class for hero section */
    .js-fullheight {
        height: 100vh;
    }

    /* Responsividade da imagem no post */
    #img-post {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 550px; /* Altura fixa para imagem no desktop */
        border-radius: 8px; /* Opcional: Borda arredondada para destacar a imagem */
    }

    /* Conteúdo adicional no desktop */
    .col-md-7 {
        margin-bottom: -20px;
    }

    /* No mobile, o conteúdo precisa se ajustar abaixo da imagem */
    @media (max-width: 759px) {
        #conteudo {
            margin-top: 0;
        }

        #img-post {
            height: 350px; /* Reduzindo a altura da imagem no mobile */
        }

        /* A imagem de fundo não deve ocupar 100% da altura no mobile */
        .hero-wrap {
            height: auto;
        }

        /* Ajusta o texto no mobile para não sobrepor a imagem */
        .paragrafo {
            font-size: 16px;
        }
    }

    /* Responsividade para telas maiores */
    @media (min-width: 1200px) {
        #img-post {
            height: 650px; /* Ajuste de altura para telas grandes */
        }
    }
</style>

@endsection
