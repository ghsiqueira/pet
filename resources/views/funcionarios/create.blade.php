@extends('layouts.app')

@section('content')

    <h1>Criar Funcionário</h1>

    <form action="{{ route('funcionarios.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection