@extends('layouts.app')

@section('content')

    <h1>Agendamentos</h1>

    @if (count($agendamentos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                    <tr>
                        <td>{{ $agendamento->funcionario->nome }}</td>
                        <td>{{ $agendamento->servico->name }}</td>
                        <td>{{ $agendamento->data }}</td>
                        <td>{{ $agendamento->horario }}</td>
                        <td>
                            <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este agendamento?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum agendamento encontrado.</p>
    @endif

    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">Novo Agendamento</a>
    <a href="javascript:history.go(-1)" class="btn btn-secondary mb-4">Voltar</a>

@endsection
