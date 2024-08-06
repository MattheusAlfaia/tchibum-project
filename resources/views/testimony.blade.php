
@extends('layout')
@section('title','depoimentos')
@section('content')


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('https://static1.s123-cdn-static-a.com/uploads/8711250/2000_655d4b81491b7.jpg?width=1200');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
           <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Depoimentos<i class="fa fa-chevron-right"></i></span></p>
           <h1 class="mb-0 bread">Depoimentos</h1>
          <a href="#depoimentos"> <i  class="fa fa-angle-double-down fa-lg" style="color: white" aria-hidden="true"></i></a>
       </div>
   </div>
  </div>
  </section>



  <section id="depoimentos" class="ftco-section">
    <div class="row ftco-animate">

        <div class="col-md-12">
            <div class="container">
            @foreach ($depoimentos as $depoimento)

            <div class="item">
              <div class="testimony-wrap py-4 d-flex">
                <div class="text">
                  <p class="{{ $depoimento->id }}">

                  </p>
                  <div class="d-flex">
                      <p class="mb-4">{{  $depoimento->depoimento }}</p>
                      <div class="container"></div>
                      <img class="experiencia" src="https://conteudo.vivala.com.br/app/uploads/2023/10/1.jpg">
                  </div>
                  <div class="d-flex align-items-center">

                    <div class="user-img" style="background-image: url('{{ secure_asset('/storage/' . $depoimento->foto) }}')"></div>
                    <div class="pl-3">
                      <p class="name">{{  $depoimento->nome }}</p>
                      <span class="position">{{  $depoimento->ocupação }}</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          @endforeach

            </div>

          <div id="pagination" class="d-flex">
            {!! $depoimentos->links() !!}
          </div>

        </div>


      </div>
  </section>


  <style scoped>

    #depoimentos{
      margin-top: -60px;
    }

    .testimony-wrap{
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    #pagination{
        margin-top: 50px;
    }

    .user-img{
        float: left;
    }

    .experiencia {
    width: 35%;
    border-radius: 50px;
    transition: transform 0.3s ease;
    position: relative;
   }

    .experiencia:hover {
        transform: scale(2.0);
        cursor: pointer;

    }



  </style>


  <script>

 /*     $(document).ready(function() {
            // Rolar a tela para baixo até 500 pixels ao carregar a página
            $('html, body').animate({
                scrollTop: 500
            }, 2000); // 1000 é a duração da animação em milissegundos
      });
 */

        let depoimentos = @json($depoimentos);


      let avaliacoes = depoimentos.data.map((element)=>{
          return element.avaliação
      })




      for (let index = 0; index < avaliacoes.length; index++) {

        for (let i= 0; i < avaliacoes[index]; i++) {


          $(`.${depoimentos.data[index].id}`).append('<span style="margin-right:5px; color:#f4bc08" class="fa fa-star"></span>');

        }


      }


  </script>







  @endsection
