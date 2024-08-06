@extends('layout')
@section('title','post')
@section('content')


<section class="hero-wrap hero-wrap-1 js-fullheight" style="background-image: url('{{ secure_asset('/storage/13.jpg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate pb-10 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Post <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">{{ $post->titulo  }}</h1>
       <a href="#posts "> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
     </div>
   </div>
 </div>
</section>




<section class="ftco-section ftco-about ftco-no-pt img">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-12 about-intro">
        <div class="row">
          <div id="conteudo" class="col-md-6 pl-md-5 py-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <!-- <span class="subheading">About Us</span> -->
                <h2 class="mb-4">{{ $post->titulo }}</h2>
                <p id="markdownText" class="paragrafo">{!!  nl2br(e($post->conteudo)) !!}</p>
                <!-- <p><a href="#" class="btn btn-primary">Book Your Destination</a></p> -->
              </div>
            </div>
          </div>
            <div class="col-md-6 d-flex">
                <div id="img-post" class="col-md-12 d-flex align-items-stretch">
                    <div class="img w-100 align-items-center justify-content-center"
                        style="background-image:url('{{ secure_asset('/storage/' . $post->imagem_principal) }}');">
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
             scrollTop: 500
         }, 2000); // 1000 é a duração da animação em milissegundos
     });

</script>

<style>

@media (max-width:759px){
    #conteudo{
        margin-top:-250px
    }
}
 #img-post{
  height: 550px;

 }

</style>

@endsection






