@extends('layout')
@section('title','comunidade')
@section('content')


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('/storage/' . $comunidade->imagem_principal) }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Comunidade <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">{{ $comunidade->nome  }}</h1>
       <a href="#posts"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
     </div>
   </div>
 </div>
</section>


<section class="ftco-section ftco-about ftco-no-pt img">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-12 about-intro">
        <div class="row">

          <div id="conteudo" class="col-md-12 pl-md-5 py-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <!-- <span class="subheading">About Us</span> -->
                <h2 id="titulo" class="mb-4">{{ $comunidade->titulo }}</h2>



                <div class="container mt-3">
                    <div class="row">
                        <!-- Primeira imagem maior -->
                        <div class="col-md-12">
                            @if ($image1 != NULL)
                                <img id="image" src="{{ asset('/storage/' . $image1 ) }}" alt="Imagem 1" class="img-fluid first-image">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Duas imagens em cima -->
                        <div class="col-md-6">
                            @if ($image2 != NULL)
                                <img  id="image" src="{{ asset('/storage/' . $image2 ) }}" alt="Imagem 2" class="img-fluid other-images">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if ($image3 != NULL)
                                <img id="image" src="{{ asset('/storage/' . $image3 ) }}" alt="Imagem 3" class="img-fluid other-images">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Duas imagens embaixo -->
                        <div class="col-md-6">
                            @if ($image4 != NULL)
                                <img id="image" src="{{ asset('/storage/' . $image4 ) }}" alt="Imagem 4" class="img-fluid other-images">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if ($image5 != NULL)
                                <img id="image" src="{{ asset('/storage/' . $image5 ) }}" alt="Imagem 5" class="img-fluid other-images">
                            @endif
                        </div>
                    </div>
                </div>




                <p >{!!  nl2br(e($comunidade->descricao)) !!}</p>
                <!-- <p><a href="#" class="btn btn-primary">Book Your Destination</a></p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
         // Rolar a tela para baixo até 500 pixels ao carregar a página
         $('html, body').animate({
             scrollTop: 620
         }, 2000); // 1000 é a duração da animação em milissegundos
     });

</script>

<style>

    #image{
        border-radius: 10px;
        border: 1px solid black;

    }

    #titulo {
        text-align: center;
        color: #f4bc08;
    }

    .first-image {
        width: 100%;
        height: auto;
    }

    .other-images {
        width: 100%;
        height: auto;
        margin-top: 10px; /* Espaço entre as imagens */
    }

</style>

@endsection






