@extends('layouts.app')

@section('content')

    <h1>Funcionários</h1>

    @if (count($funcionarios) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->telefone }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-primary">Editar</a>

                        <!-- Formulário de exclusão -->
                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <p>Nenhum funcionário encontrado.</p>
    @endif

    <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Novo Funcionário</a>
    <a href="javascript:history.go(-1)" class="btn btn-secondary mb-4">Voltar</a>
@endsection