@extends('layout')
@section('title', 'Tchibum - Selecione o pacote')
@section('content')

    <section id="posts" class="ftco-section" style="background-image:url('{{ asset('/images/18.jpg') }}');">
        <div class="container">
            <div class="row d-flex">
                <div id="container" class="container mt-5">
                    <div class="step step-2">
                        <h3>INFORMAÇÕES DA COMUNIDADE</h3>

                        <div id="info-comunidade">
                            <div class="row">
                                <span>{{ $comunidade->titulo }}</span>
                                <span>{{ $comunidade->descricao }}</span>
                            </div>
                        </div>
                        <form id="form-comunidade" method="post" action="{{ route('pacoteSteps.create') }}">
                            @csrf
                            <input type="hidden" name="comunidade_id" id="comunidade_id" value="{{$comunidade->id}}">
                            {{-- <button type="submit" class="btn btn-primary prev-step">{{ trans('messages.anterior') }}</button> --}}
                            <button type="submit" id="continuar-resultado" class="btn btn-primary next-step">{{ trans('messages.continuar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
