<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/images/logo.jpg')}}"/>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-cTf9aImi42Xrq1zL5IU3yERgF/ZGJ8jFf0Y5SGgkPl5FtM2j4af0/TzX5lX0L/wJSsZ8trHfjW9CZGmH8ekyeg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.timepicker.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.14/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/multiselect-05/css/style.css') }}">


    <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    @vite(['resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    @yield('content')

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">TCHIBUM<span>NA AMAZÔNIA</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item"><a href="/" class="nav-link">HOME</a></li>

                    @if (auth()->user()?->role == 'admin')
                        <li class="nav-item"><a href="/admin" class="nav-link">ADMIN</a></li>
                    @endif

                    <li class="nav-item"><a href="/sobre" class="nav-link">{{ trans('messages.quem_somos') }}</a></li>

                    {{-- <li class="nav-item"><a href="/posts" class="nav-link">{{ trans('messages.noticias') }}</a></li> --}}

                    <li class="nav-item">
                        <div class="nav-link dropdown">
                            <button class="nav-link btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PACOTES
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/pacotes">{{ trans('messages.pacote_fechado') }}</a>
                                {{-- <a class="dropdown-item" id="modalInfoComple" >{{ trans('messages.comunidade') }}</a> --}}
                                <a class="dropdown-item" href="{{ route('pacotes.custom') }}">Pacotes Personalizados</a>
                            </div>
                        </div>
                    </li>
                 
                    @auth
                 
                    <li class="nav-item"><a href="/compras-{{auth()->user()->id}}" class="nav-link">{{ trans('messages.compras') }}</a></li>

                    @endauth


                    <li class="nav-item"><a href="/faleconosco" class="nav-link">{{ trans('messages.fale_conosco_layout') }}</a></li>
                    
                    {{-- <li class="nav-item">
                        <div class="nav-link dropdown">
                            <button class="nav-link btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('messages.idiomas') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                            href="{{ route('change.language', ['locale' => 'pt']) }}">{{ trans('messages.portugues') }}</a>
                            <a class="dropdown-item"
                            href="{{ route('change.language', ['locale' => 'en']) }}">{{ trans('messages.ingles') }}</a>
                            <a class="dropdown-item"
                            href="{{ route('change.language', ['locale' => 'es']) }}">{{ trans('messages.espanhol') }}</a>
                        </div>
                    </div>
                </li>  --}}
                
                
                @guest
                <li class="nav-item"><a href="/login" class="nav-link">{{ trans('messages.entrar') }}</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">{{ trans('messages.cadastrar') }}</a></li>
                @endguest
                
                @auth
                
                <form action="/logout" method="POST">
                    @csrf
                    <li class="nav-ite"><a id="logout" href="/logout"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> </a>
                            </li>
                        </form>

                    @endauth
                </ul>
            </div>
        </div>
    </nav>


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
                        <input type="text" id="cpf" name="cpf" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.endereco') }}</label>
                        <input type="text" id="endereco" name="endereco" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Cep</label>
                        <input type="text" id="cep" name="cep" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.cidade') }}</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.identificacao') }}</label>
                        <input type="text" id="identificacao" name="identificacao" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.proficao') }}</label>
                        <input type="text" id="proficao" name="proficao" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.nacionalidade') }}</label>
                        <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('messages.estado') }}</label>
                        <input type="text" id="estado" name="estado" class="form-control" required>
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



    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url('{{ asset('') }}');">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">{{ trans('messages.quem_somos_footer') }}?</h2>
                        <p>{{ trans('messages.text1') }}.
                            {{ trans('messages.text2') }}
                            {{ trans('messages.text3') }}.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="https://api.whatsapp.com/send/?phone=559292197150&text=Ol%C3%A1%2C+gostaria+de+tirar+algumas+d%C3%BAvidas&type=phone_number&app_absent=0"><span class="fa-brands fa-whatsapp"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100087119875074&mibextid=4MzKDw5ooBP2efJs"><span class="fa-brands fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/tchibumnaamazonia"><span class="fa-brands fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">{{ trans('messages.informacoes') }}</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">{{ trans('messages.regulamento_geral') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('messages.condicoes_de_reserva') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('messages.politica_de_privacidade') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('messages.politica_de_reembolso') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">{{ trans('messages.experiencia') }}</h2>
                        <ul class="list-unstyled">
                            <li><a class="py-2 d-block">{{ trans('messages.aventura') }}</a></li>
                            <li><a class="py-2 d-block">{{ trans('messages.hotel_e_restaurantes') }}</a></li>
                            <li><a class="py-2 d-block">{{ trans('messages.praias') }}</a></li>
                            <li><a class="py-2 d-block">{{ trans('messages.natureza') }}</a></li>
                            <li><a class="py-2 d-block">{{ trans('messages.acampamentos') }}</a></li>
                            <li><a class="py-2 d-block">{{ trans('messages.festas_regionais') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">{{ trans('messages.duvidas') }}?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">Rua Coronel Salgado, 529, Aparecida, 69010450, Manaus – AM.</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+55 92 9219-7150</span></a></li>
                                <li>
                                    <a href="mailto:tchibumnamazonia@gmail.com"><span class="icon fa fa-paper-plane"></span><span
                                    class="text" style="font-size: 14px;">tchibumnamazonia@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos os direitos reservados 
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <style>

        #modalInfoComple{
            cursor: pointer;
        }
    </style>

    <script>

       

        $("#modalInfoComple").click(function () {


                    if(user == null){

                        window.location.href = '/login';

                    }else{

                    
                
                            if(user.endereco == null &&
                            user.cep == null &&
                            user.cidade == null &&
                            user.proficao == null &&
                            user.nacionalidade == null &&
                            user.estado == null ){
                            

                                $("#meuModal").fadeIn();

                            }else{

                                window.location.href = '/pacotes_personalizados';

                            }
                    }
                });

                // enviardadoscomple

                $('#enviardadoscomple').click(function () {
                    let formData = $('#form').serialize();


                    $.ajax({
                        type: 'POST',
                        url: '/adddadoscomple/'+ user.id,  // Substitua '/sua-rota-no-laravel' pela sua rota Laravel
                        data: formData,
                        success: function (response) {

                            window.location.href = '/pacotes_personalizados';

                        },
                        error: function (error) {
                            // Lógica para tratar erros (se necessário)
                            console.log(error);
                        }

                    });
                });
        
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.14/dist/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('multiselect-05/js/main.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
