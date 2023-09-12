@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Serviços</h1>

    <a href="{{ route('servicos.create') }}" class="btn btn-success mb-4">Novo Serviço</a>
    <a href="javascript:history.go(-1)" class="btn btn-secondary mb-4">Voltar</a>
    
    <div class="row">
        @foreach($services as $service)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($service->price / 100, 2, ',', '.') }}</p>
                    <p class="card-text"><strong>Descrição:</strong> {{ $service->description }}</p>
                    @if ($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Imagem do serviço" class="img-fluid">
                    @endif
                    <a href="{{ route('servicos.edit', $service->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('servicos.destroy', $service->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
