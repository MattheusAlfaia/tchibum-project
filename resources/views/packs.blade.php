@extends('layout')
@section('title','posts')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ secure_asset('/storage/47.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Pacotes <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">Pacotes</h1>
         <a href="#posts"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
       </div>
     </div>
   </div>
  </section>

  <section id="posts" class="ftco-section">
    <div class="container">
        <div class="row d-flex">

          @foreach ($pacotes as $pacote)



            <div  class="col-md-4 d-flex ftco-animate" >
                    <div class="blog-entry justify-content-end">
                      <img class="block-20" src="{{secure_asset('/storage/'. $pacote->imagem_principal)}}">

                    <div class="text">
                      <div class="d-flex align-items-center mb-4 topp">
                           <span class="day"  style="font-size:20px;">{{ $pacote->comunidade->nome }}</span>
                       </div>
                    <h3 class="heading"><a href="/pacote-{{ $pacote->id }}">{{ $pacote->titulo }}</a></h3>
                    <p>{{ $pacote->descricao }}</p>
                    <p><a href="/pacote-{{ $pacote->id }}" class="btn btn-primary">Detalhes</a></p>
                  </div>
                </div>
            </div>

          @endforeach

        </div>
    </div>

    <div class="row mt-5">
      <div class="col text-center">

            <div class="d-flex">
              {!! $pacotes->links() !!}
            </div>

      </div>
    </div>
    </div>



  </section>



   <script>
    $(document).ready(function() {
           // Rolar a tela para baixo até 500 pixels ao carregar a página
           $('html, body').animate({
               scrollTop: 615
           }, 2000); // 1000 é a duração da animação em milissegundos
       });
  </script>

@endsection






{{-- sessões arquivadas --}}



{{--   <section class="ftco-intro ftco-section ftco-no-pt">
   <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-12 text-center">
      <div class="img"  style="background-image: url(images/bg_2.jpg);">
       <div class="overlay"></div>
       <h2>We Are Pacific A Travel Agency</h2>
       <p>We can manage your dream building A small river named Duden flows by their place</p>
       <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
     </div>
   </div>
  </div>
  </div>
  </section>
 --}}

{{--  <h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
<p><a href="#" class="btn btn-primary">Read more</a></p> --}}
