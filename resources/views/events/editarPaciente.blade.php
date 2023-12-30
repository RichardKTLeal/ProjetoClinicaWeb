@extends('layout.main')

@section('title', 'Editar Paciente')

@section('content')

<link rel="stylesheet" href="/css/styles.css">

<div id="pacientes-container" class="col-md-12">
    <h2>Editar Paciente</h2>
    <p class="subtitle">Edite os dados do paciente selecionado</p>

    <form method="POST" action="/paciente/atualizar/{{ $paciente->id }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value= "{{ $paciente->nome }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value=" {{ $paciente->email }} ">
        </div>

        <div class="form-group">
            <label for="especie">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value=" {{ $paciente->telefone }} ">
        </div>

        <div class="form-group">
            <label for="sexo">Sexo</label>
            <input type="text" class="form-control" name="sexo" id="sexo" value="{{ $paciente->sexo }}" readonly>
        </div>


        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao">{{ $paciente->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="telefone">Nascimento</label>
            <input type="text" class="form-control" name="data" id="data" value=" {{ $paciente->data }} ">
        </div>

        <button type="submit" class="btn btn-warning" id="button-nav">Salvar</button>
    </form>

</div>

@endsection
