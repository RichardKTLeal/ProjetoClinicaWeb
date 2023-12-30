@extends('layout.main')

@section('title', 'Servicos')

@section('content')
<link rel="stylesheet" href="/css/styles.css">

<div id="pacientes-container" class="col-md-12">
  <h2>Meus Serviços</h2>
  <p class="subtitle">Serviços cadastrados</p>
  <a href="/servicos/create" class="btn btn-primary ml-2"> Cadastrar +</a>
  <div id="cards-container" class="row">
    @foreach ($servicos as $servico)
      <div class="card col-md-3">
        <div class="card-body" id="card-body-servico">
          <h5 class="card-nome"> {{ $servico->nome }} </h5>
          <p class="card-raca"> R$ {{ $servico->valor }} </p>
          <p class="card-tutor"> Descrição: {{ $servico->descricao }} </p>
          <div class="btn-servicos" style="width: 100%">
            <div class="btn-servicos-container">
              <form method="POST" action="/servico/delete/{{ $servico->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="btn-servico">Deletar</button>
              </form>
              <form method="POST" action="/servico/editar/{{ $servico->id }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-warning" id="btn-servico">Alterar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>


@endsection

