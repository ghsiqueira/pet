@extends('layouts.app')

@section('content')

<h1>Editar Agendamento</h1>

<form action="{{ route('agendamentos.update', $agendamento->id) }}" method="post">
    @csrf
    @method('PUT') <!-- Adicione este campo para indicar que é uma atualização -->
    <div class="form-group">
        <label for="funcionario_id">Funcionário</label>
        <select name="funcionario_id" id="funcionario_id" class="form-control">
            @foreach ($funcionarios as $funcionario)
            <option value="{{ $funcionario->id }}" {{ $funcionario->id == $agendamento->funcionario_id ? 'selected' : '' }}>
                {{ $funcionario->nome }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="services_id">Serviço</label>
        <select name="services_id" id="services_id" class="form-control">
            @foreach ($servicos as $servico)
            <option value="{{ $servico->id }}" {{ $servico->id == $agendamento->services_id ? 'selected' : '' }}>
                {{ $servico->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" name="data" id="data" class="form-control" value="{{ $agendamento->data }}">
    </div>
    <div class="form-group">
        <label for="horario">Horário</label>
        <input type="time" name="horario" id="horario" class="form-control" value="{{ $agendamento->horario }}">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
