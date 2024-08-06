@extends('layout')
@section('title','pacote')
@section('content')


<section id="posts" class="ftco-section" style="background-image:url('{{ secure_asset('/storage/32.jpg') }}');">
    <div class="container">
        <div class="row d-flex">
 
            
            <div class="product-container">
                <div class="infos">
                    <div class="product-details">
                        <div class="row">    
                          <div class="col text-center">  
                              <h5>{{ trans('messages.opcoes') }}</h5>                   
                              <div id="flex">
                                  <button type="button" id="pacote-fechado" class="btn btn-success">{{ trans('messages.pacote_fechado') }}</button>
                                  <button type="button" id="pacote-perso" class="btn btn-secondary">{{ trans('messages.pacote_personalizado') }}</button>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
   
            </div>

 
            <div class="pacoteusuario-container">
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pacote</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>

                    @foreach ( $pacotesusuario as $pacoteusuario )
                        
            
                    <tbody>
                      <tr>
                        <th scope="row">{{ $pacoteusuario->id }}</th>
                        <td> {{$pacoteusuario->pacote->nome}}</td>
                        <td> {{ $pacoteusuario->user->name }}</td>
                        <td> {{$pacoteusuario->status}}</td>
                      </tr>
            
                    </tbody>

                    @endforeach
                  </table>
            </div>

            <div class="pacotepersousuario-container">
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Status (Aprovação)</th>
                        <th scope="col">Status (Pagamento)</th>
                      </tr>
                    </thead>

                    @foreach ( $pacotespersosusuario as $pacotepersosusuario )
                        
            
                    <tbody>
                      <tr>
                        <th scope="row">{{ $pacotepersosusuario->pacoteperso_id }}</th>
                        <td> {{ $pacotepersosusuario->user->name }}</td>
                        <td> {{$pacotepersosusuario->pacoteperso->status}}</td>
                     
                        @if ($pacotepersosusuario->status == 'PENDENTE' )
                          
                        <td style="color: #fff ; background-color: yellow;"> {{$pacotepersosusuario->status}}</td>

                        @elseif ($pacotepersosusuario->status == 'PAGO')
                        
                        <td style="color: #fff ; background-color: green;"> {{$pacotepersosusuario->status}}</td>

                        @elseif ($pacotepersosusuario->status == 'NAO_PAGO')

                        <td style="color: #fff ; background-color: red;"> NÃO PAGO</td>

                        @endif
                      </tr>
            
                    </tbody>

                    @endforeach
                  </table>
            </div>

            
            <div id="navagation" class="row mt-5">
                <div class="col text-center">
          
                      <div class="d-flex">
                        {!! $pacotesusuario->links() !!}
                      </div>
          
                </div>
              </div>

        </div>
    </div>


    </div>



  </section>

  <script>
    $(document).ready(function () {
      // Hide both containers initially
      $(".pacoteusuario-container").hide();
      $(".pacotepersousuario-container").hide();
      $("#navagation").hide();
  
      // Click event handler for "Pacotes Fechados" button
      $("#pacote-fechado").click(function () {
        // Show pacoteusuario-container and hide pacotepersousuario-container
        $(".pacoteusuario-container").show();
        $("#navagation").show();
        $(".pacotepersousuario-container").hide();
      });
  
      // Click event handler for "Pacotes Personalizados" button
      $("#pacote-perso").click(function () {
        // Show pacotepersousuario-container and hide pacoteusuario-container
        $(".pacotepersousuario-container").show();
        $("#navagation").hide();
        $(".pacoteusuario-container").hide();
      });
    });
  </script>
 


  <style>

    button{
      margin-right: 20px;
    }

    #comprar{
        color: #fff;
       
    }

    .container {
        margin-top: 30px;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }




    .pacoteusuario-container,.product-container,.pacotepersousuario-container {
        max-width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        display: flex;
    }

    .infos {
        max-width: 80%;
        margin: -20px auto;
        padding: 20px;
        display: flex;
    }

    .product-image {
        max-width: 50%;  /* Ajuste o tamanho da imagem principal aqui */
        height: auto;
        border-radius: 5px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .image-thumbnails {
        display: flex;
        flex-direction: column;
    }

    .thumbnail {
        max-width: 80px;
        height: auto;
        margin-bottom: 10px;
        cursor: pointer;
    }

    #flex{
      display: flex;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-description {
        line-height: 1.6;
    }

    .product-price {
        font-size: 24px;
        color: #333;
    }

    #loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        #loading p {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background: #fff;
        }

    /* Media queries for responsive design */
    
    /* Media queries for responsive design */
    @media (max-width: 768px) {
    .product-container {
        flex-direction: column;
        align-items: center;
    }

    .product-image {
        display: none;
    }

    .infos {
        margin-top: 20px;
    }

    .image-thumbnails {
        margin: 0 auto;

    }

    #flex{
      display: block ;
    }


    .thumbnail{
       max-width: 100%;
    }

    .infos {
        flex-direction: column;
    }

    .product-details {
        max-width: 100%;
    }
}


</style>



@endsection


