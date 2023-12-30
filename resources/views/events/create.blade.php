@extends('layout.main')

@section('title', 'Cadastrar paciente')

@section('content')
<link rel="stylesheet" href="/css/styles.css">

    @if ($errors->any())
        <div class="alert alert-danger" id="alerta">
                @foreach ($errors->all() as $error)
                    <div id="erromensagem"></br>{{ $error }} </div> 
                @endforeach
        </div>
    @endif

    <div id="pacientes-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de Pacientes</h1>
        <form action="/pacientes" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Foto do paciente: </label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label for="data">Data de nascimento </label>
                <input type="date" class="form-control" name="data" id="data" placeholder="dd/mm/aaaa">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo: </label>
                <select class="form-control" id="sexo" name="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone para contato </label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <input type="submit" class="btn btn-primary" value="Cadastrar paciente">
        </form>
    </div>
    

@endsection