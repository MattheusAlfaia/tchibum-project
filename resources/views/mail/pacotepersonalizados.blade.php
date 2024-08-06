<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/animate.css">

</head>

<div class="container">
    <h3>Nova Solicitação de Pacote Personalizado</h3><br>
    <h5>Informações do Pacote: </h5>
    <div id="pacote">
        <p> <strong>Pacote:</strong>  {{$pacotepersonalizado->id}}</p>
        <p>  <strong>Preço:</strong> R$ {{$pacotepersonalizado->preco}}</p>
        <p> <strong>Data:</strong> {{date('d/m/Y', strtotime($pacotepersonalizado->data))}}</p>

    </div>

    <div id="pacote">
        <p> <strong>Quantidade de Pessoas:</strong> {{$pacotepersonalizado->pessoas}}</p>
        <p> <strong>Dias do Pacote:</strong> {{$pacotepersonalizado->dias}}</p>

    </div>

    <div id="pacote"><p> <strong>Comunidade:</strong> {{$pacotepersonalizado->comunidade->nome}}</p></div>

    <h5>Informações das Atividades Inclusas: </h5>




        <table class="table" >
            <thead>
              <tr>
                <th scope="col">Atividade</th>
                <th scope="col">Preço</th>
              </tr>
            </thead>
            @foreach ($pacotepersonalizado->opcoes as $opcao )
                <tbody>
                <tr>
                    <td>{{ $opcao->nome }}</td>
                    <td>R$ {{ $opcao->preco }}</td>
                </tr>
                </tbody>
            @endforeach
          </table>


    <h5>Informações do Cliente: </h5>
    <div id="user">
        <p> <strong>Nome:</strong> {{$user->name}}</p>
        <p> <strong>Email:</strong> {{$user->email}}</p>
    </div>
    <p>Atenciosamente,<br>Seu Nome<br>Seu Cargo<br>Nome da Sua Empresa</p>
    @if (auth()->user()->role == 'admin')
    <a href="https://tchibumnaamazonia.com/pacoteperso/aprovarsolicitacao/{{$pacotepersonalizado->id}}" class="btn btn-success">Aprovar Solicitação</a>
    <a href="https://tchibumnaamazonia.com/pacoteperso/reprovarsolicitacao/{{$pacotepersonalizado->id}}" class="btn btn-danger">Recusar Solicitação</a>
    <a href="https://tchibumnaamazonia.com/compras-{{$pacotepersonalizado->user->id}}" class="btn btn-primary">Acompanhar a Compra</a>
    @elseif (auth()->user()->role == 'user')
    <a href="https://tchibumnaamazonia.com/compras-{{$pacotepersonalizado->user->id}}" class="btn btn-primary">Acompanhe sua Compra</a>
    @endif
  </div>



<style>

body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }



    #pacote{
        display: flex;

    }
    #pacote p{
        margin-left: 10px;

    }

    #user p{
        margin-left: 10px;

    }
</style>
