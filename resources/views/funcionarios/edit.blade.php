@extends('layouts.app')

@section('content')

    <h1>Editar Funcionário</h1>

    <form method="POST" action="{{ route('funcionarios.update', ['id' => $funcionario->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $funcionario->nome }}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $funcionario->email }}">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" class="form-control" value="{{ $funcionario->telefone }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <!-- Formulário de exclusão com confirmação -->
    <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="post">
        @csrf
        @method('delete')

        <!-- Botão para abrir a confirmação de exclusão -->
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#confirmDelete">
            Excluir
        </button>

        <!-- Modal de confirmação de exclusão -->
        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir este funcionário?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
