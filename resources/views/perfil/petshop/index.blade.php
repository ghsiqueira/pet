@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil de Pet Shop') }}</div>

                <div class="card-body">
                    <!-- Conteúdo do perfil do pet shop aqui -->
                    <p>Informações sobre o seu pet shop.</p>
                    
                    <!-- Exemplo de informações específicas de pet shop -->
                    <div>
                        <strong>Nome do Pet Shop:</strong> Nome do Seu Pet Shop<br>
                        <strong>Localização:</strong> Endereço do Seu Pet Shop<br>
                        <!-- Adicione mais informações aqui -->
                    </div>
                    <a href="{{ route('servicos.index') }}" class="btn btn-success mb-4">Serviços</a>
                    <a href="{{ route('petshop.eventos.index') }}" class="btn btn-success mb-4">Eventos</a>
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-success mb-4">Funcionários</a>
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-success mb-4">Agendamentos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
