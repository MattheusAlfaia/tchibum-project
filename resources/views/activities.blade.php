
@extends('layout')
@section('title','atividades')
@section('content')



  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ secure_asset('/storage/bg_viajens.jpg') }}');">
   <div class="overlay"></div>
   <div class="container">
     <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
       <div class="col-md-9 ftco-animate pb-5 text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Atividades <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-0 bread">Atividades</h1>
        <a href="#atividades"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
 </section>

 <section id="atividades" class="ftco-section">
   <div class="container">
     <div class="row d-flex">



        @foreach ($opcoes as $opcoe)


        <div  class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                  <img class="block-20" src="{{secure_asset('/storage/'. $opcoe->imagem)}}">

                  <div class="text">
                  <div class="d-flex align-items-center mb-4 top">
                </div>
                <h3 class="heading">{{ $opcoe->nome }}</h3>
                <p>{{ $opcoe->titulo }}</p>
                <p><a href="/atividade-{{ $opcoe->id }}" class="btn btn-primary">Ler mais</a></p>
              </div>
            </div>
        </div>

      @endforeach

    </div>

 <div class="row mt-5">
   <div class="col text-center">
    <div class="d-flex">
        {!! $opcoes->links() !!}
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
