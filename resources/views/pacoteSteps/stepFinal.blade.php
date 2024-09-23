@extends('layout')
@section('title', 'Tchibum - Selecione o pacote')
@section('content')

    <section id="posts" class="ftco-section" style="background-image:url('{{ asset('/images/18.jpg') }}');">
        <div class="container">
            <div class="row d-flex">
                <div id="container" class="container mt-5">
                    <div class="step step-3">
                        <h3 class="text-white">{{ trans('messages.pessoas_e_atividades') }}</h3>
                        <form action="{{ route('pacoteSteps.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="comunidade_id" value="{{ $comunidade->id }}">
                            <div class="row text-white">
                                <!-- Pessoas -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="pessoas"
                                            class="form-label">{{ trans('messages.quantidade_de_pessoas') }}:</label>
                                        <input type="text" id="pessoas" class="form-control" name="pessoas"  required>
                                    </div>
                                </div>

                                <!-- Data -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="data" class="form-label">{{ trans('messages.data') }}:</label>
                                        <input type="date" class="form-control" id="data" name="data" required>
                                    </div>
                                </div>

                                <!-- Data Final -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="data_final"
                                            class="form-label">{{ trans('messages.data_final') }}:</label>
                                        <input type="date" class="form-control" id="data_final" name="data_final" required>
                                    </div>
                                </div>
                            </div>


                            <h3 class="text-white"> Selecionar Atividades </h3>
                            <div class="mb-3">
                                <select class="js-select2 select-dd" id="opcoes_atividades" name="atividades[]" multiple="multiple" required>
                                    @foreach ($atividades as $atividade)
                                        <option value="{{ $atividade->id }}" data-preco="{{ $atividade->preco }}">
                                            {{ $atividade->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <h3 class="text-white">Detalhes:</h3>
                            <card
                                class="card card-body bg-light text-dark"
                                style="border-radius: 10px; padding: 10px; margin-bottom: 10px;">
                                <div class="mb-3">
                                    <h5 class="text">Comunidade: {{ $comunidade->nome }}</h5>
                                    <h5 class="text" id="qtd_pessoas">Quantidade de Pessoas:</h5>
                                    <h5 class="text" id="label_data_inicial">Data Inicial:</h5>
                                    <h5 class="text" id="label_data_final">Data Final:</h5>
                                    <h5 class="text" id="label_atividades">Atividades Incluídas:</h5>
                                    <p class="text-danger font-weight-bold">{{ $comunidade->mensagem }}</p>
                                    <h5 class="text">Taxa de transporte: R$ {{ number_format($comunidade->taxa, 2, ',', '.') }}</h5>
                                    <h5 class="text" id="preco_final">Preço Total: </h5>
                                </div>
                            </card>

                            <button type="submit" class="btn btn-success" id="enviarDados">
                                Finalizar Compra!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

function obterDataAtual() {
    var hoje = new Date();
    var ano = hoje.getFullYear();
    var mes = String(hoje.getMonth() + 1).padStart(2, '0');
    var dia = String(hoje.getDate()).padStart(2, '0');
    return ano + '-' + mes + '-' + dia;
}

$('#data').attr('min', obterDataAtual());
$('#data_final').attr('min', obterDataAtual());

$('#enviarDados').click(function() {
    var pessoas = $('#pessoas').val();
    var data = $('#data').val();
    var data_final = $('#data_final').val();
    var atividades = $('#opcoes_atividades').val();

    if (pessoas === '' || data === '' || data_final === '' || atividades.length === 0) {
        alert('Preencha todos os campos');
        return;
    }
});

$('#pessoas').on('input', function() {
    var pessoas = $(this).val();
    if (pessoas < 0) {
        pessoas = 1;
        $(this).val(1);
    }
    $('#qtd_pessoas').text('Quantidade de Pessoas: ' + pessoas);
});

$('#data').change(function() {
    var data = $(this).val();
    $('#label_data_inicial').text('Data Inicial: ' + formatarData(data));
});

$('#data_final').change(function() {
    var data_final = $(this).val();
    $('#label_data_final').text('Data Final: ' + formatarData(data_final));
});

$('#opcoes_atividades').change(function() {
    var atividades_id = $(this).val();
    var atividades = '';
    var preco_total = 0;

    $('#atividades_selecionadas').empty();

    for (var i = 0; i < atividades_id.length; i++) {
        var option = $('#opcoes_atividades option[value=' + atividades_id[i] + ']');
        var nomeAtividade = option.text();
        var precoAtividade = parseFloat(option.data('preco'));

        atividades += '<span style="margin-right: 15px;">' + nomeAtividade +
                      ' <span class="preco-caixinha">R$ ' + precoAtividade.toFixed(2).replace('.', ',') + '</span></span>';

        preco_total += precoAtividade;
    }

    var taxa = {{ $comunidade->taxa }};
    var preco_final = (preco_total * $('#pessoas').val()) + taxa;


    $('#label_atividades').html(atividades);
    $('#preco_final').text('Preço Total: ' + formatarMoeda(preco_final));
});

$('#pessoas').change(function() {
    $('#opcoes_atividades').trigger('change');
});

function formatarMoeda(valor) {
    return valor.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}

function formatarData(data) {
    var dataObj = new Date(data);
    var dia = String(dataObj.getUTCDate()).padStart(2, '0');
    var mes = String(dataObj.getUTCMonth() + 1).padStart(2, '0');
    var ano = dataObj.getUTCFullYear();
    return dia + '/' + mes + '/' + ano;
}
});

    </script>
    <style>
        .preco-caixinha {
            background-color: #e0f3e7;
            color: #2d6a4f;
            padding: 2px 8px;
            border-radius: 5px;
            font-weight: normal;
            font-size: 0.9rem;
            margin-left: 8px;
            display: inline-block;
        }
    </style>
@endsection
