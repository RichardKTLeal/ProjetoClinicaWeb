@extends('layout.main')

@section('title', $paciente->nome)

@section('content')
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="/resources/css/show.css">

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/paciente/{{ $paciente->image }}" class="img-fluid" alt="{{ $paciente->nome }}">
            </div>
            <div id="image-container" class="col-md-6">
                <h1>{{ $paciente->nome }}</h1>
                <p class="paciente-data">Nascimento: {{ $paciente->data }}</p>
                <p class="paciente-sexo">Sexo: {{ $paciente->sexo }}</p>
                <p class="paciente-contato">Contato: {{ $paciente->telefone }}</p>
                <p class="paciente-email">email: {{ $paciente->email }}</p>
                <p class="paciente-descricao">Descrição: {{ $paciente->descricao }}</p>
            </div>
            <a href="/atendimento/create?id={{ $paciente->id }}" class="btn btn-primary ml-2 mr-4" id="atender">Verificar paciente</a>
            <form method="POST" action="/paciente/delete/{{ $paciente->id }}">
                 @csrf
                 @method('DELETE')
                <button type="submit" class="btn btn-danger mr-4 color-red">Cancelar atendimento</button>
            </form>
            <form method="POST" action="/paciente/editar/{{ $paciente->id }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-warning" id="btn-servico">Editar paciente</button>
            </form>
        </div>
    </div>

@endsection