@extends('layout.main')

@section('title', 'Editar Serviço')

@section('content')

<link rel="stylesheet" href="/css/styles.css">

<div id="pacientes-container" class="col-md-12">
  <h2>Editar Serviço</h2>
  <p class="subtitle">Edite os dados do serviço selecionado</p>

  <form method="POST" action="/servico/atualizar/{{ $servico->id }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" value= "{{ $servico->nome }}">
    </div>

    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="text" class="form-control" name="valor" id="valor" value=" {{ $servico->valor }} ">
    </div>

    <div class="form-group">
      <label for="descricao">Descrição</label>
      <textarea class="form-control" name="descricao" id="descricao">{{ $servico->descricao }}</textarea>
    </div>

    <button type="submit" class="btn btn-warning" id="button-nav">Salvar</button>
  </form>

</div>

@endsection
