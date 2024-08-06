@extends('layout')
@section('title','posts')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ secure_asset('/storage/bg_posts.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Posts <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">Posts</h1>
         <a href="#posts"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
       </div>
     </div>
   </div>
  </section>





  <section id="posts" class="ftco-section">
    <div class="container">
        <div class="row d-flex">

          @foreach ($posts as $post)

            @php
                $created_at = $post->created_at;

                $datepost = $created_at->format('Y-m-d H:i:s');

                $dia = $created_at->format('d');
                setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'portuguese');
                $mes = ucfirst(strftime('%B', strtotime($created_at->format('Y-m-d'))));
                $ano = $created_at->format('Y');
            @endphp

            <div  class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                      <img class="block-20" src="{{ secure_asset('/storage/'. $post->imagem_principal)}}">

                      <div class="text">
                      <div class="d-flex align-items-center mb-4 topp">
                        <div class="one">
                        <span class="day"  style="font-size:30px;">{{ $dia }}</span>
                      </div>
                      <div class="two">
                        <span class="yr">{{ $ano }}</span>
                        <span class="mos">{{ $mes }}</span>
                      </div>
                    </div>
                    <h3 class="heading"><a href="/post-{{$datepost}}">{{ $post->titulo }}</a></h3>
                    <p>{{ $post->descricao }}</p>
                    <p><a href="/post-{{$datepost}}" class="btn btn-primary">{{ trans('messages.ler_mais') }}</a></p>
                  </div>
                </div>
            </div>

          @endforeach

        </div>
    </div>

    <div class="row mt-5">
      <div class="col text-center">

            <div class="d-flex">
              {!! $posts->links() !!}
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
