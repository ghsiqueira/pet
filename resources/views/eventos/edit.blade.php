@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Evento</h1>

        <form action="{{ route('petshop.eventos.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $evento->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Evento</label>
                <textarea class="form-control" id="descricao" name="descricao" required>{{ $evento->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="data_hora">Data e Hora do Evento</label>
                @php
                    use Carbon\Carbon;
                    $dataHora = Carbon::createFromFormat('Y-m-d H:i:s', $evento->data_hora)->format('Y-m-d\TH:i');
                @endphp
                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" value="{{ $dataHora }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Evento</button>
        </form>
    </div>
@endsection
