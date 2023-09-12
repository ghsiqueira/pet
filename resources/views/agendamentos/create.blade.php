@extends('layouts.app')

@section('content')

<h1>Criar Agendamento</h1>

<form action="{{ route('agendamentos.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="funcionario_id">Funcionário</label>
        <select name="funcionario_id" id="funcionario_id" class="form-control">
            @foreach ($funcionarios as $funcionario)
            <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="services_id">Serviço</label>
        <select name="services_id" id="services_id" class="form-control">
            @foreach ($servicos as $servico) <!-- Aqui troque $services por $servicos -->
            <option value="{{ $servico->id }}">{{ $servico->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" name="data" id="data" class="form-control">
    </div>
    <div class="form-group">
        <label for="horario">Horário</label>
        <input type="time" name="horario" id="horario" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>

@endsection
