@extends('layout')
@section('title','sobre')
@section('content')



  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ secure_asset('/storage/27.jpg') }});
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  ">
   <div class="overlay"></div>
   <div class="container">
     <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
       <div class="col-md-9 ftco-animate pb-5 text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>{{ trans('messages.sobre_nos') }} <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-0 bread">{{ trans('messages.sobre_nos') }}</h1>
        <a href="#sobre"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
 </section>

 <section id="sobre" class="ftco-section services-section">
   <div class="container">
     <div class="row d-flex">
       <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
        <div class="w-100">
         <span class="subheading">{{ trans('messages.sobre_titulo') }}</span>
         <h2 class="mb-4">{{ trans('messages.sobre') }}</h2>
         <p class="paragrafo"> {!! nl2br(e(trans('messages.sobre_texto'))) !!}</p>
       </div>
     </div>
     <div class="col-md-6">
      <div class="row">
       <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
         <div class="services services-1 color-1 d-block img" style="background-image: url('{{ secure_asset('/storage/' . $sobre->imagem_atividade_comunidade1) }}');">
           {{-- <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div> --}}
           <div class="media-body">
             <h3 class="heading mb-3">{{ trans('messages.sobre_nome_atividade_comunidade1') }}</h3>
             <p class="descricao_atividade_comunidade">{{ trans('messages.sobre_descricao_atividade_comunidade1') }}</p>
           </div>
         </div>
       </div>
       <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
         <div class="services services-1 color-2 d-block img" style="background-image: url('{{ secure_asset('/storage/' . $sobre->imagem_atividade_comunidade2) }}');">
           {{-- <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div> --}}
           <div class="media-body">
             <h3 class="heading mb-3">{{ trans('messages.sobre_nome_atividade_comunidade2') }}</h3>
             <p class="descricao_atividade_comunidade">{{ trans('messages.sobre_descricao_atividade_comunidade2') }}</p>
           </div>
         </div>
       </div>
       <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
         <div class="services services-1 color-3 d-block img" style="background-image: url('{{ secure_asset('/storage/' . $sobre->imagem_atividade_comunidade3) }}');">
           {{-- <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div> --}}
           <div class="media-body">
             <h3 class="heading mb-3">{{ trans('messages.sobre_nome_atividade_comunidade3') }}</h3>
             <p class="descricao_atividade_comunidade">{{ trans('messages.sobre_descricao_atividade_comunidade3') }}</p>
           </div>
         </div>
       </div>
       <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
         <div class="services services-1 color-4 d-block img" style="background-image: url('{{ secure_asset('/storage/' . $sobre->imagem_atividade_comunidade4) }}');">
           {{-- <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div> --}}
           <div class="media-body">
             <h3 class="heading mb-3">{{ trans('messages.sobre_nome_atividade_comunidade4') }}</h3>
             <p class="descricao_atividade_comunidade">{{ trans('messages.sobre_descricao_atividade_comunidade4') }}</p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 </div>
 </section>




 <section id="video" class="container ftco-section ftco-about img" style="background-image: url('{{ secure_asset('/storage/' . $sobre->capa_video_principal) }}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  ">
  <div class="overlay"></div>
  <div class="container py-md-5">
    <div class="row py-md-5">
      <div class="col-md d-flex align-items-center justify-content-center">
        <a href="{{secure_asset('/storage/'. $sobre->video_principal)}}"
          class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
          <span class="fa fa-play"></span>
        </a>
      </div>
    </div>
  </div>
</section>


<script>
  $(document).ready(function() {
         // Rolar a tela para baixo até 500 pixels ao carregar a página
         $('html, body').animate({
             scrollTop: 700
         }, 2000); // 1000 é a duração da animação em milissegundos
     });
</script>


 @endsection
