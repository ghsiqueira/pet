@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Eventos</h1>

        <a href="{{ route('petshop.eventos.create') }}" class="btn btn-primary mb-3">Criar Novo Evento</a>
        <a href="javascript:history.go(-1)" class="btn btn-secondary mb-4">Voltar</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data e Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo }}</td>
                        <td>{{ $evento->descricao }}</td>
                        <td>{{ $evento->data_hora }}</td>
                        <td>
                            <a href="{{ route('petshop.eventos.edit', $evento->id) }}" class="btn btn-info">Editar</a>
                            <form action="{{ route('petshop.eventos.destroy', $evento->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
