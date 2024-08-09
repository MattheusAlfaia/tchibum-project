@extends('layout')
@section('title', 'Tchibum - Selecione o pacote')
@section('content')

<section id="posts" class="ftco-section" style="background-image:url('{{ asset('/images/18.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div id="container" class="container mt-5">
                <div class="step step-2 text-center">
                    <h3 class="text-white mb-4">INFORMAÇÕES DA COMUNIDADE</h3>

                    <card class="card card-body bg-light text-dark" style="border-radius: 10px; padding: 10px; margin-bottom: 10px;">
                        <div id="info-comunidade" class="mb-4">
                            <div class="row mb-3">
                            <div class="col-12">
                                <h4 class="font-weight-bold">{{ $comunidade->nome }}</h4>
                            </div>
                            <div class="col-12 mt-2">
                                    <span>{{ $comunidade->titulo }}</span>
                                </div>
                                <div class="col-12">
                                    <p>{{ $comunidade->descricao }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/'.$comunidade->imagem_principal) }}" alt="Imagem da comunidade" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </card>
                    
                    <form id="form-comunidade" method="POST" action="{{ route('pacoteSteps.create') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="comunidade_id" id="comunidade_id" value="{{$comunidade->id}}">
                        <button type="submit" id="continuar-resultado" class="btn btn-primary">{{ trans('messages.continuar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection