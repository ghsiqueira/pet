@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Criar Novo Evento</h1>

        <form action="{{ route('petshop.eventos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Evento</label>
                <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="data_hora">Data e Hora do Evento</label>
                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Evento</button>
        </form>
    </div>
@endsection
