@extends('layout')
@section('title', 'Tchibum - Selecione o pacote')
@section('content')

    <section id="posts" class="ftco-section" style="background-image:url('{{ asset('/images/18.jpg') }}');">
        <div class="container">
            <div class="row d-flex">
                <div id="container" class="container mt-5">
                    <div class="step step-1">
                        <h3 class="text-white"> {{ trans('messages.localidade_e_datas') }}</h3>
                        <form action="{{ route('pacoteSteps.comunidade') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="comunidade" class="form-label text-white">{{ trans('messages.selecionar_comunidade') }}:</label>
                                <select class="form-select" id="comunidade" name="comunidade_id" placeholder="{{ trans('messages.escolha_opcao') }}">

                                    @foreach ($comunidades as $comunidade)
                                        <option name="comunidade" value="{{ $comunidade->id }}">{{ $comunidade->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="next1"
                                class="btn btn-block btn-primary next-step">{{ trans('messages.continuar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
