@extends('layout')
@section('title', 'Tchibum - Selecione o pacote')
@section('content')

    <section id="posts" class="ftco-section" style="background-image:url('{{ asset('/images/18.jpg') }}');">
        <div class="container">
            <div class="row d-flex">
                <div id="container" class="container mt-5">
                    <div class="step step-3">
                        <h3>{{ trans('messages.pessoas_e_atividades') }}</h3>
                        <form id="form" method="POST" action="">
                            @csrf
                            <input type="hidden" name="comunidade_id" value="{{ $comunidade->id }}">
                            <div class="row">
                                <!-- Pessoas -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="pessoas"
                                            class="form-label">{{ trans('messages.quantidade_de_pessoas') }}:</label>
                                        <input type="number" id="pessoas" class="form-control" name="pessoas"
                                        value="1" min="1" required>
                                    </div>
                                </div>

                                <!-- Data -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="data" class="form-label">{{ trans('messages.data') }}:</label>
                                        <input type="date" class="form-control" id="data" name="data">
                                    </div>
                                </div>

                                <!-- Data Final -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="data_final"
                                            class="form-label">{{ trans('messages.data_final') }}:</label>
                                        <input type="date" class="form-control" id="data_final" name="data_final">
                                    </div>
                                </div>
                            </div>


                            <h3> Selecionar Atividades </h3>
                            <div class="mb-3">
                                <select class="js-select2 select-dd" id="opcoes_atividades" name="atividades[]"
                                    multiple="multiple">
                                    @foreach ($atividades as $atividade)
                                        <option value="{{ $atividade->id }}" data-preco="{{ $atividade->preco }}">
                                            {{ $atividade->nome }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <h3>Detalhes:</h3>
                            <div class="mb-3">
                                <h5 class="">Comunidade: {{ $comunidade->nome }}</h5>
                                <h5 class="" id="qtd_pessoas">Quantidade de Pessoas:</h5>
                                <h5 class="" id="label_data_inicial">Data Inicial:</h5>
                                <h5 class="" id="label_data_final">Data Final:</h5>
                                <h5 class="" id="label_atividades">Atividades Incluidas:</h5>
                                <h5 class="" id="preco_final">Preço Total: </h5>
                            </div>

                            {{-- <button type="button"
                                class="btn btn-primary prev-step">{{ trans('messages.anterior') }}</button> --}}
                            <button type="button" id="enviarDados"
                                class="btn btn-success">{{ trans('messages.compra_com_tchibum') }}</button>
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
                if (pessoas < 1) {
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

                for (var i = 0; i < atividades_id.length; i++) {
                    var option = $('#opcoes_atividades option[value=' + atividades_id[i] + ']');
                    atividades += option.text() + ', ';
                    preco_total += parseFloat(option.data('preco')); // Adiciona o preço da atividade
                }

                $('#label_atividades').text('Atividades Incluídas: ' + atividades);
                $('#preco_final').text('Preço Total: ' + formatarMoeda(preco_total * $('#pessoas').val()));
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
@endsection
