@extends('layout')
@section('title', 'Comunidade')
@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('/storage/' . $comunidade->imagem_principal) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/">Home <i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>Comunidade <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">{{ $comunidade->nome }}</h1>
                <a href="#conteudo">
                    <i class="fa fa-angle-double-down fa-lg" style="color: white;" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Sobre a Comunidade Section -->
<section class="ftco-section ftco-about ftco-no-pt img" id="conteudo">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-12 pl-md-5 py-5">
                        <div class="heading-section ftco-animate">
                            <h2 id="titulo" class="mb-4">{{ $comunidade->titulo }}</h2>
                            <p class="paragrafo">{!! markdown(nl2br(e($comunidade->descricao))) !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Galeria de Imagens da Comunidade -->
                <div class="container mt-5 gallery-container">
                    <div class="gallery-wrapper">
                        <div class="gallery-slider">
                            @foreach ([$image1, $image2, $image3, $image4, $image5] as $index => $image)
                                @if ($image)
                                    <div class="gallery-item" data-index="{{ $index }}">
                                        <a href="{{ asset('/storage/' . $image) }}" data-lightbox="comunidade-gallery">
                                            <img src="{{ asset('/storage/' . $image) }}" alt="Imagem {{ $index + 1 }}" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Carrossel de Atividades da Comunidade -->
@if($comunidade->opcoes->isNotEmpty())
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <span class="subtitletch">O que oferecemos de melhor</span>
                <h2 class="mb-4">Nossas Atividades</h2>
            </div>
        </div>
        <div class="slick-carousel-atividades">
            @foreach ($comunidade->opcoes as $opcao)
                <div class="col-md-4">
                    <a href="/atividade-{{ $opcao->id }}">
                        <div class="project-wrap">
                            <div class="img" style="background-image: url('{{ asset('/storage/' . $opcao->imagem) }}')"></div>
                            <div class="text p-4" style="height: 16rem">
                                <h3>{{ $opcao->nome }}</h3>
                                <p class="location"><span class="fa fa-map-marker"></span> {{ $opcao->comunidade->nome }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Carrossel de Pacotes Fechados da Comunidade -->
@if($comunidade->pacotes->isNotEmpty())
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2>Pacotes</h2>
            </div>
        </div>
        @if (count($comunidade->pacotes) <= 3)
            <style>
                @media (min-width: 780px) {
                    .slick-carousel-pacotes .slick-track {
                        width: 100% !important;
                    }
                }
            </style>
        @endif
        <div class="slick-carousel-pacotes">
            @foreach ($comunidade->pacotes as $pacote)
                <div class="col-md-4" style="width: 300px;">
                    <a href="/pacote-{{ $pacote->id }}">
                        <div class="project-wrap">
                            <div class="img" style="background-image: url('{{ asset('/storage/' . $pacote->imagem_principal) }}')">
                                <span class="price">R$ {{ number_format($pacote->preco, 2, ',', '.') }} </span>
                            </div>
                            <div class="text p-4" style="height: 20rem">
                                <span class="days">{{ $pacote->dias }} Dias de Tour</span>
                                <h3>{{ $pacote->nome }}</h3>
                                <p class="location"><span class="fa fa-map-marker"></span>{{ $pacote->comunidade->nome }}</p>
                                <ul>
                                    <li><i class="fa fa-users"></i> {{ $pacote->pessoas }}</li>
                                    <li><span style="color: #999999" class="fa fa-calendar"></span>
                                        {{ date('d/m/y', strtotime($pacote->data)) }} - {{ date('d/m/y', strtotime($pacote->data_final)) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Styles -->
<style>
    /* Outros estilos já presentes */

    /* Estilo da galeria */
    .gallery-container {
        overflow: hidden;
        max-width: 100%;
        position: relative;
    }

    .gallery-wrapper {
        display: flex;
        justify-content: center;
        overflow: hidden;
        width: 100%;
    }

    .gallery-slider {
        display: flex;
        transition: transform 0.8s ease-in-out;
    }

    .gallery-item {
        flex: 0 0 60%;
        max-width: 60%;
        margin-right: -20%;
        opacity: 0.5;
        cursor: pointer;
        transform: scale(0.9);
        transition: all 0.5s ease;
    }

    .gallery-item.active {
        flex: 0 0 60%;
        opacity: 1;
        transform: scale(1);
    }

    .gallery-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<!-- Scripts -->
@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function(){
        // Carrossel de atividades com Slick
        $('.slick-carousel-atividades').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // Carrossel de pacotes com Slick
        $('.slick-carousel-pacotes').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // Galeria em loop infinito
        const items = document.querySelectorAll(".gallery-item");
        let currentIndex = 0;

        function updateGallery() {
            items.forEach((item, index) => {
                item.classList.remove("active");
                if (index === currentIndex) {
                    item.classList.add("active");
                }
            });

            const translateX = (currentIndex * -60) + 20;
            document.querySelector(".gallery-slider").style.transform = `translateX(${translateX}%)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateGallery();
        }

        setInterval(nextSlide, 5000);

        items.forEach((item, index) => {
            item.addEventListener("click", () => {
                currentIndex = index;
                updateGallery();
            });
        });

        updateGallery();
    });
</script>
@endsection

@endsection
