@extends('layout')
@section('title', 'Post')
@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-1 js-fullheight" style="background-image: url('{{ asset('/images/13.jpg') }}');">
    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.4);"></div> <!-- Leve sobreposição para legibilidade -->
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-10 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/" aria-label="Voltar para a página inicial">Home <i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>Post <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">{{ $post->titulo }}</h1>
                <a href="#posts" aria-label="Ir para o conteúdo do post">
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
                    @if($post->imagem_principal)
                        <div class="img w-100 align-items-center justify-content-center"
                            style="background-image:url('{{ asset('/storage/' . $post->imagem_principal) }}');"
                            aria-label="Imagem principal do post">
                        </div>
                    @endif
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
        height: 550px;
        border-radius: 8px;
    }

    /* Conteúdo adicional no desktop */
    .col-md-7 {
        margin-bottom: -20px;
    }

    /* Ajustes no mobile */
    @media (max-width: 759px) {
        #conteudo {
            margin-top: 0;
        }

        #img-post {
            height: 350px;
        }

        .hero-wrap {
            height: auto;
        }

        .paragrafo {
            font-size: 16px;
        }
    }

    /* Ajustes para telas grandes */
    @media (min-width: 1200px) {
        #img-post {
            height: 650px;
        }
    }
</style>

<!-- Smooth Scroll -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const link = document.querySelector('a[href="#posts"]');
        if (link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('#posts').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        }
    });
</script>

@endsection
