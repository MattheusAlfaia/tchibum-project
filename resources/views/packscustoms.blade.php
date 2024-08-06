@extends('layout')
@section('title','pacote personalizado')
@section('content')


<section id="posts" class="ftco-section" style="background-image:url('{{ secure_asset('/storage/18.jpg') }}');">
    <div class="container">
        <div class="row d-flex">

            <div id="loading">
                <div id="spinner" class="spinner-border" role="status"></div>
                <div><span >Estamos verificando, aguarde por favor...</span></div>
            </div>


            <!--<div  class="container mt-4">-->
                <!-- Alerta Bootstrap -->
            <!--    <div id="message-data-ocupado" class="alert alert-danger alert-dismissible fade show" role="alert">-->
            <!--        {{ trans('messages.ja_existe_agendamento') }}-->
            <!--        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">-->
            <!--            <span aria-hidden="true">&times;</span>-->
            <!--        </button>-->
            <!--    </div>-->

            
            <!--<div  class="container mt-4">-->
                <!-- Alerta Bootstrap -->
            <!--    <div id="message-data-disponivel" class="alert alert-success alert-dismissible fade show" role="alert">-->
            <!--        {{ trans('messages.data_esta_disponivel') }}-->
            <!--    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">-->
            <!--        <span aria-hidden="true">&times;</span>-->
            <!--    </button>-->
            <!--</div>-->
            
        
            <!--<div  class="container mt-4">-->
                <!-- Alerta Bootstrap -->
            <!--    <div id="message-dias-ocupado" class="alert alert-danger alert-dismissible fade show" role="alert">-->
            <!--        {{ trans('messages.colidem') }}-->
            <!--    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">-->
            <!--        <span aria-hidden="true">&times;</span>-->
            <!--    </button>-->
            <!--</div>-->

            <!--<div  class="container mt-4">-->
                <!-- Alerta Bootstrap -->
            <!--    <div id="message-dias-disponivel" class="alert alert-success alert-dismissible fade show" role="alert">-->
            <!--        {{ trans('messages.conformidade') }}-->
            <!--    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">-->
            <!--        <span aria-hidden="true">&times;</span>-->
            <!--    </button>-->
            <!--</div>-->


            <!-- partial:index.partial.html -->
            <div id="container" class="container mt-5">
                <div class="progress px-1" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="step-container d-flex justify-content-between">
                <div class="step-circle" onclick="displayStep(1)">1</div>
                <div class="step-circle" onclick="displayStep(2)">2</div>
                <div class="step-circle" onclick="displayStep(3)">3</div>
                
                </div>

                <form id="multi-step-form">
                    <div class="step step-1">

                        <!-- Step 1 form fields here -->
                        <h3 > {{ trans('messages.localidade_e_datas') }}</h3>
                        <div class="mb-3">
                            <label  for="comunidade" class="form-label">{{ trans('messages.selecionar_comunidade') }}:</label>
                            <select class="form-select" id="comunidade" name="field1">

                                <option selected>{{ trans('messages.escolha_opcao') }}</option>

                                @foreach ($comunidades as $comunidade)

                                <option name="comunidade">{{  $comunidade->nome }}</option>

                                @endforeach
                            </select>

                        </div>

                  

                        <button type="button" id="next1" class="btn btn-primary next-step">{{ trans('messages.continuar') }}</button >

                    </div>

                    <div class="step step-2">
                        <!-- Step 2 form fields here -->

                        <h3>INFORMAÇÕES DA COMUNIDADE</h3>
               
                        <div id="info-comunidade">

                            
                        </div>
    
                        <button type="button" class="btn btn-primary prev-step">{{ trans('messages.anterior') }}</button>
                        <button type="button" id="continuar-resultado" class="btn btn-primary next-step">{{ trans('messages.continuar') }}</button>
                    </div>


                    <!-- Step 3 form fields here -->
                    
                    <div class="step step-3">
                      

                        <h3>{{ trans('messages.pessoas_e_atividades') }}</h3>

                        <div class="row">
                            <!-- Pessoas -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pessoas" class="form-label">{{ trans('messages.quantidade_de_pessoas') }}:</label>
                                    <input type="number" id="pessoas" class="form-control" name="pessoas">
                                </div>
                            </div>
                        
                            <!-- Data -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="data" class="form-label">{{ trans('messages.data') }}:</label>
                                    <input type="date" class="form-control" id="data" name="data" disabled>
                                </div>
                            </div>
                        
                            <!-- Data Final -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="data_final" class="form-label">{{ trans('messages.data_final') }}:</label>
                                    <input type="date" class="form-control" id="data_final" name="data_final" disabled>
                                </div>
                            </div>
                        </div>
                        
                     
                       <h3> Selecionar Atividades </h3>
                       <div class="mb-3 select-container">
                           <div class="col-lg-4 d-flex justify-content-center align-items-center">
                               <select class="js-select2 select-dd" id="opcoes_comunidade" name="atividades[]" multiple="multiple" >

                               </select>
                            </div>

                       </div>


                        <h3>Seu Pacote</h3>

                         <div id="respostas">

                         </div>
                         <br>

                        <button type="button" class="btn btn-primary prev-step">{{ trans('messages.anterior') }}</button>
                        <button type="button" id="enviarDados" class="btn btn-success">{{ trans('messages.compra_com_tchibum') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

  <script>

    let currentStep = 1;
    let updateProgressBar;
    let comunidades = @json($comunidades);
    let opcoes = @json($opcoes);
    let comunidade_escolhida = 0;
    let opcoes_comunidade =  [];
    let option = '';
    let opcao_preco = null;
    let user = @json(auth()->user());



    $(document).ready(function() {

        let dados = {};
        let resultado = '';
        let soma = 0;
        var valoresUnicos = new Set();
        $('#loading').fadeOut();
        $('#message-data-ocupado').fadeOut();
        $('#message-data-disponivel').fadeOut();
        $('#message-dias-ocupado').fadeOut();
        $('#message-dias-disponivel').fadeOut();
     

        setTimeout(function() {
              $("#meuModal").fadeOut();
            }, 10000);
        
        $("#fechar").click(function () {

           $("#meuModal").fadeOut();

        });
   
        

        podeClicar = localStorage.getItem('podeClicar');

        if(podeClicar == null){
            localStorage.setItem('podeClicar', 'true');
        }
       
        function ativarBotao() {
            console.log('ativar botão');
            localStorage.setItem('podeClicar', 'true');
        }

        $('#enviarDados').on('click', function() {
            // if (podeClicar == 'true') {

                 

                
                let formData = {
                    comunidade: dados.comunidade,
                    data: dados.data,
                    data_final: dados.data_final,
                    pessoas: dados.pessoas,
                    opcoes:  [],
                    precototal: dados.precototal
                };

                dados.opcoes.map(function(opcoe){

                    formData.opcoes.push({ atividade: opcoe.text , preco: opcoe.id});
                });
                  
                  
                $.ajax({
                    type: 'POST',
                    url: '/pacoteperso/criarpacotepersonalizado',
                    data: { _token: '{{ csrf_token() }}', formData },
                    success: function (response) {

                        console.log(response);
                        window.location.href = response;

                    },
                    error: function (error) {
                  
                            console.log(error);
                    }

                });

                // Desativa o botão
                // podeClicar = false;
                localStorage.setItem('podeClicar', 'false');

                

                // Configura um temporizador para reativar o botão após 1 hora
                //3600000
                
            

            // } else {
            //    setTimeout(ativarBotao, 3600000); // reativar o botão de comprar
            //    alert('Aguarde 1 hora antes de clicar novamente.');
            // }
        });

        // Verifica se o temporizador deve ser reiniciado ao carregar a página
        if (podeClicar == 'false') {
            var tempoRestante = localStorage.getItem('tempoRestante');
            if (tempoRestante) {
                setTimeout(ativarBotao, Math.max(0, tempoRestante - Date.now()));
            }
        }

        // Adiciona um evento para salvar o tempo restante ao fechar a página
        $(window).on('beforeunload', function() {
            if (podeClicar == 'false') {
                localStorage.setItem('tempoRestante', Date.now() + 3600000);
            }
        });

        $('#calendar-modal').click(function(){
            $("#meuModal").fadeIn();

        });

        $('#pessoas').change(function() {
         // Habilitar o campo de data se uma comunidade for selecionada
          $('#data').prop('disabled', false);
       });

        $('#data').change(function() {
         // Habilitar o campo de data se uma comunidade for selecionada
          $('#data_final').prop('disabled', false);
          $('#enviarDados').prop('disabled', false);
       });


        $('#comunidade').on('change', function() {
            dados.comunidade = $(this).val();

            comunidades.map(function(comunidade){
               if(comunidade.nome ==  dados.comunidade ){
                    
                    comunidade_escolhida = comunidade.id;

                    console.log(comunidade);

                    var imgSrc = "{{ secure_asset('/storage/') }}" + '/' + comunidade.imagem_principal;
                    $('#info-comunidade').html('<div style="background-color: white; padding: 10px; border-radius: 10px; margin-bottom: 10px;">' +
                        '<h4 class="text-center">' + comunidade.nome + '</h4>' +
                        '<p> ' + comunidade.descricao + '</p>' +
                        '<img class="img-fluid" src="' + imgSrc + '" alt="Imagem da Comunidade" style="width: 100%; border-radius: 10px; margin-top: 10px;">' +
                    '</div>');

            }
        });

            


            opcoes.map(function(opcoe){

                if(opcoe.comunidade_id ==  comunidade_escolhida){
                    opcoes_comunidade.push(opcoe);
               }
            })

            $('#opcoes_comunidade').empty();

            opcoes_comunidade.forEach(function(opcao) {


                    option = $('<option></option>').attr('value', JSON.stringify(opcao.preco)).attr('title', JSON.stringify(opcao.por_pessoa)).text(opcao.nome);



                $('#opcoes_comunidade').append(option);
            });

      });

        $('#data').on('input', function() {
            dados.data = $(this).val();

            let formData = {
               
                data: dados.data,
                comunidade: dados.comunidade
             };

       
       
        });


        $('#data_final').on('input', function() {
            dados.data_final = $(this).val();

            let formData = {
               
               data: dados.data,
               comunidade: dados.comunidade,
               data_final: dados.data_final
            };


      

        });

        $('#pessoas').on('input', function() {
            dados.pessoas = $(this).val();

        });

        $('#opcoes_comunidade').select2();

        $('#opcoes_comunidade').on('change', function() {

            dados.opcoes = $('#opcoes_comunidade').select2('data');


            let comunidade = '<i class="fa fa-home" aria-hidden="true"> <strong> Comunidade: </strong>' + dados.comunidade + '<br><br>';

            var dataOriginal = dados.data;  // Substitua isso pela sua data
            var dataFinalOriginal = dados.data_final;  // Substitua isso pela sua data

            // Converte para um objeto Date
            var dataObjeto = new Date(dataOriginal);
            var dataFinalObjeto = new Date(dataFinalOriginal);

            // Obtém os componentes da data
            var dia = dataObjeto.getDate().toString().padStart(2, '0');
            var mes = (dataObjeto.getMonth() + 1).toString().padStart(2, '0');
            var ano = dataObjeto.getFullYear();
            

            // Cria a string da data no formato desejado
            var dataFormatada = dia + '/' + mes + '/' + ano;
            
            // Obtém os componentes da data
            var dia_final = dataFinalObjeto.getDate().toString().padStart(2, '0');
            var mes_final = (dataFinalObjeto.getMonth() + 1).toString().padStart(2, '0');
            var ano_final = dataFinalObjeto.getFullYear();
            
            // Cria a string da data no formato desejado
            var dataFinalFormatada = dia_final + '/' + mes_final + '/' + ano_final;

            let data = '<i class="fa fa-calendar" aria-hidden="true"> <strong> Data Inicial: </strong> ' + dataFormatada + '<br><br>';

            let data_final = '<i class="fa fa-bed" aria-hidden="true"> <strong> Data Final: </strong> ' + dataFinalFormatada + '<br><br>';

            let pessoas = '<i class="fa fa-users" aria-hidden="true"> <strong> Quantidade de Pessoas: </strong>' + dados.pessoas + '<br><br>';



            dados.opcoes.forEach(function(opcao) {


                if (opcao.title == "true") {
                    opcao_preco = parseFloat(opcao.id);
                    opcao_preco = opcao_preco * dados.pessoas;

                }else{
                    opcao_preco = parseFloat(opcao.id) ;
                }

              

                valoresUnicos.add(opcao_preco );

            });


            let arrayValoresUnicos = Array.from(valoresUnicos);

            let soma = arrayValoresUnicos.reduce(function(acc, valor) {

                return acc + valor ;

            }, 0);


            function arredondarParaMultiploDe5(numero) {
                    return Math.round(numero / 5) * 5;
                }

            dados.precototal = arredondarParaMultiploDe5(soma);



            let precototal = '<i class="fa fa-money-bill" aria-hidden="true"> <strong> Preço Total: </strong> ' + 'R$' + Math.floor(soma)

            resultado = comunidade + data + data_final + pessoas + '<strong> Opções selecionadas: </strong> <br>';


            dados.opcoes.forEach(function(opcao) {
                if (opcao.title == "true") {
                    resultado += opcao.text + ' R$' + Math.floor( opcao.id  * dados.pessoas ) + '<br>';
                }else{
                    resultado += opcao.text + ' R$' + Math.floor(opcao.id)+ '<br>';
                }

            });

            resultado += '<br>'+ precototal;

            exibirResultado();
        });

    



      function exibirResultado() {


        $('#respostas').html(resultado);
      }

    
      $('#enviarDados').click(function () {


        });

    });




  function displayStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= 3) {
      $(".step-" + currentStep).hide();
      $(".step-" + stepNumber).show();
      currentStep = stepNumber;
      updateProgressBar();
    }
  }

  $(document).ready(function() {
    $('#multi-step-form').find('.step').slice(1).hide();

    $(".next-step").click(function() {
      if (currentStep < 3) {
        $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
        currentStep++;
        setTimeout(function() {
          $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
          $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
          updateProgressBar();
        }, 500);
      }
    });

    $(".prev-step").click(function() {
      if (currentStep > 1) {
        $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
        currentStep--;
        setTimeout(function() {
          $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
          $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
          updateProgressBar();
        }, 500);
      }
    });

    updateProgressBar = function() {
      let progressPercentage = ((currentStep - 1) / 2) * 100;
      $(".progress-bar").css("width", progressPercentage + "%");
    }
  });
  </script>

  <style>
        
        #posts{
            background-repeat: no-repeat;
            background-color: black;
        }

        #comunidade-page{
            color: white;
        }
        #atividade-page{
            color: white;
        }

        #calendar-modal{
            color: white;
        }

        a{
            color:#f4bc08;

        }

        /* calendar */

        .calendar {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        /*  */

        #respostas{
            padding: 20px;
            border: 1px solid black;
            border-radius: 20px;
            font-size: 20px;
            background-color: #fff;
        }
        h3{
            color: #fff
        }

        label{
            color: #fff
        }
        #container {
        max-width: 700px;
        }

        .step-container {
        position: relative;
        text-align: center;
        transform: translateY(-43%);
        }

        #loading {
            display: flex;
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
        
        #spinner{
          margin-right: 20px;

        }

        .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #fff;
        border: 2px solid #f4bc08;
        line-height: 30px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        cursor: pointer; /* Added cursor pointer */
        }

        .step-line {
        position: absolute;
        top: 16px;
        left: 50px;
        width: calc(100% - 100px);
        height: 2px;
        background-color: #fd5f00 !important;
        z-index: -1;
        }

        #multi-step-form {
        overflow-x: hidden;
        }

        .select-container {
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .col-lg-4 {
        width: 100% !important;
        }
        .select-dd {
        width: 100% !important;
        }

  </style>
@endsection
