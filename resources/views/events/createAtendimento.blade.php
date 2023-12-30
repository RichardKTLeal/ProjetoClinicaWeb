@extends('layout.main')

@section('title', 'Cadastrar Atendimento')

@section('content')
<link rel="stylesheet" href="/css/styles.css">

    <div id="pacientes-create-container" class="col-md-6 offset-md-3">
        <h1>Atendimento</h1>
        <form action="/atendimentos" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="paciente_id" value="{{ request('id') }}">
            </div>
            <div class="form-group">
                <label for="servico">Serviço: </label>
                <select name="servico" class="form-control" id="servico">
                    <option value="" disabled selected>Selecione o serviço</option>
                    @foreach ($servicos as $servico)
                        <option value="{{$servico->id}}">{{$servico->nome}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Cadastrar Atendimento">
        </form>
    </div>

@endsection