@extends('layout')
@section('title','pacote')
@section('content')




<section id="posts" class="ftco-section" style="background-image:url('{{ secure_asset('/storage/32.jpg') }}'); background-repeat: no-repeat;">
    <div class="container">
        <div class="row d-flex">

            <div class="product-container">

                <div class="image-thumbnails">
                    <img class="thumbnail" src="{{secure_asset('/storage/'. $pacote->imagem_principal)}}" alt="Thumbnail 1">

                    @foreach ($pacote->imagens_secundarias as $imagem )
                        <img class="thumbnail" src="{{secure_asset('/storage/'. $imagem )}}" alt="Thumbnail 1">
                    @endforeach
                </div>


                <div id="loading">
                    <div  class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                </div>


               <div class="product-image">
                <img class="img-fluid" src="{{secure_asset('/storage/'. $pacote->imagem_principal)}}" alt="Product Image">
              </div>


                <div class="product-details">
                    <h2>{{ $pacote->nome }}</h2>
                    <h5>{{ $pacote->titulo }}</h5>
                    <p class="product-description">
                        {{ $pacote->descricao }}
                    </p>
                    <p class="product-price">R$ {{ number_format($pacote->preco, 2, ',', '.') }}</p>

                    <a  id="comprar" class="btn btn-success">{{ trans('messages.comprar') }}</a>

                    {{-- href="/solicitacaocompra/{{ $pacote->id }}" --}}
                </div>
            </div>

            <div class="infos">
                <div class="product-details">
                    <div id="flex" class="col-md-12">
                        <div class="row">
                        
                                <h5><i class="fa fa-calendar" aria-hidden="true"></i> {{ trans('messages.data') }}: {{ date('d/m/Y',strtotime($pacote->data)) }}</h5>
                                <h5><i class="fa fa-users" aria-hidden="true"></i> {{ trans('messages.qauntidade_de_pessoas') }}: {{ $pacote->pessoas }} </h5>
                                
                        
                        </div>

                        <div class="row">
            
                            <h5><i class="fa fa-calendar" aria-hidden="true"></i> {{ trans('messages.data_final') }}: {{ date('d/m/Y',strtotime($pacote->data_final)) }} </h5>
                            <h5><i class="fa fa-home" aria-hidden="true"></i> {{ trans('messages.comunidade') }}: {{ $pacote->comunidade->nome }} </h5>
                      
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Atividades</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ trans('messages.nome') }}</th>
                                        <th scope="col">{{ trans('messages.preco') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacote->opcoes as $opcao)
                                    <tr>
                                        <td>{{ $opcao->nome }}</td>
                                        <td>R$ {{ $opcao->preco }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ trans('messages.informacao') }}</h2>
                            <p class="product-description">
                                {{ $pacote->infos }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="meuModal">
                <div class="modal-dialog">
                   <div class="modal-content">

                      <!-- Cabeçalho do Modal -->
                      <div class="modal-header">
                         <h4 class="modal-title">{{ trans('messages.informacao_adicional') }}</h4>
                         <button type="button" id="fechar" class="close" data-dismiss="modal">&times;</button>
                      </div>


                      <!-- Corpo do Modal -->
                      <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                        <form id="form">
                           @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="estrangeiro">
                                <label class="form-check-label" for="flexRadioDefault1" >
                                    {{ trans('messages.e_estrangeiro') }}
                                </label>
                              </div>

                            <div class="mb-3" id="cpf-container">
                                <label for="cpf"  class="form-label">CPF</label>
                                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF">
                            </div>

                              <div class="mb-3" id="uf-container">
                                <label for="uf" class="form-label">UF</label>
                                <input type="text" id="uf" name="uf" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.endereco') }}</label>
                                <input type="text" id="endereco" name="endereco" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Cep</label>
                                <input type="text" id="cep" name="cep" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.cidade') }}</label>
                                <input type="text" id="cidade" name="cidade" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.identificacao') }}</label>
                                <input type="text" id="identificacao" name="identificacao" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.proficao') }}</label>
                                <input type="text" id="proficao" name="proficao" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.nacionalidade') }}</label>
                                <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('messages.estado') }}</label>
                                <input type="text" id="estado" name="estado" class="form-control" >
                            </div>

                          </form>

                      </div>

                      <!-- Rodapé do Modal -->
                      <div class="modal-footer">
                        <button id="enviardadoscomple" type="submit" class="btn btn-success" data-dismiss="modal">{{ trans('messages.enviar') }}</button>

                      </div>

                   </div>
                </div>
             </div>



            <section>
                <div class="modal fade" id="modalImagem" tabindex="-1" role="dialog" aria-labelledby="modalImagemLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-color: transparent; border: none;">
                            <div class="modal-body">
                                <img src="" class="img-fluid" id="imagemModal" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>


    </div>



  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script>

     
     let user = @json(auth()->user());
     let pacote = @json($pacote);

     console.log(user);

    jQuery(document).ready(function ($) {
      // Aplicar a máscara para o CPF
      $('#cpf').mask('000.000.000-00', { reverse: true });
     });


    $(document).ready(function() {
        $("#loading").hide();
        // if estrangeiro


        $('#estrangeiro').change(function () {
            // Se o checkbox estiver marcado (pessoa estrangeira), oculte os campos "UF" e "CPF"
            if ($(this).prop('checked')) {
                $('#uf, #cpf').hide();
            } else {
                // Se o checkbox estiver desmarcado (pessoa não estrangeira), exiba os campos "UF" e "CPF"
                $('#uf, #cpf').show();
            }
        });

        //imgs

        $('.product-image').click(function() {
            let src = $(this).children('img').attr('src');
            $('#imagemModal').attr('src', src);
            $('#modalImagem').modal('show');
        });

        $('.thumbnail').click(function() {
            let newImageSrc = $(this).attr('src');
            $('.product-image img').attr('src', newImageSrc);
        });
    });


    $("#comprar").click(function () {
        
    
        if(user == null){

            window.location.href = '/register';

        }else{

            if(user.endereco == null &&
            user.cep == null &&
            user.cidade == null &&
            user.proficao == null &&
            user.nacionalidade == null &&
            user.estado == null ){

                $("#meuModal").fadeIn();

            }else{

                $("#loading").show();

                $.ajax({
                    type: 'POST',
                    url: '/solicitacaocompra/'+ pacote.id,
                    data: { _token: '{{ csrf_token() }}' },
                    success: function (response) {

                        $("#loading").hide();
                        console.log(response);
                        window.location.href = response;


                    },
                    error: function (error) {
                        // Lógica para tratar erros (se necessário)
                        $("#loading").hide();
                        console.log(error);
                    }
                });
            }
        }
    });

     // form

     $('#enviardadoscomple').click(function () {
            let formData = $('#form').serialize();


            $("#meuModal").fadeIn();

            $.ajax({
                type: 'POST',
                url: '/adddadoscomple/'+ user.id,  // Substitua '/sua-rota-no-laravel' pela sua rota Laravel
                data: formData,
                success: function (response) {

                    location.reload();

                    $.ajax({
                    type: 'POST',
                    url: '/solicitacaocompra/'+ pacote.id,
                    data: { _token: '{{ csrf_token() }}' },
                    success: function (response) {

                        $("#loading").hide();
                        console.log(response)
                        window.location.href = response;


                    },
                    error: function (error) {
                        // Lógica para tratar erros (se necessário)
                        $("#loading").hide();
                        console.log(error);
                    }
                });

                },
                error: function (error) {
                    // Lógica para tratar erros (se necessário)
                    console.log(error);
                }

            });
        });

    $("#fechar").click(function () {

      $("#meuModal").fadeOut();

   });


</script>


  <style>

    #comprar{
        color: #fff
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

    .product-container {
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
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
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