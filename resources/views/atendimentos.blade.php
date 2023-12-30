@extends('layout.main')

@section('title', 'Atendimentos')

@section('content')
<link rel="stylesheet" href="/css/styles.css">

<div id="pacientes-container" class="col-md-12">
    <h2>Atendimentos</h2>
    <p class="subtitle">Atendimentos cadastrados</p>
    <div id="cards-container" class="row">
        @foreach ($atendimentos as $atendimento)
            <div class="card col-md-3">
                <img src="/img/paciente/{{ $atendimento->paciente->image }}" alt="">
                <div class="card-body">
                    <h5 class="card-nome">
                     {{ $atendimento->paciente->nome }}
                    </h5>
                    <p class="card-raca">
                        Serviço: {{ $atendimento->servico->nome }}
                    </p>
                    <p class="card-raca">
                        {{ $atendimento->paciente->tutor }}
                    </p>
                    <p class="card-raca">
                        {{ $atendimento->status }}
                    </p>
                    <form method="POST" action="/atendimento/delete/{{ $atendimento->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success mr-4 color-red">Concluir atendimento</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection